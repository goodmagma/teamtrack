<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Workspace;
use App\Models\Project;
use App\Models\Task;

/**
 * Task Controller
 * 
 * @author Denis
 */
class TaskController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * List Projects
     *
     * @param Request $request
     * @param Workspace $workspace
     * @param Project $project
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request, Workspace $workspace)
    {
        //check account owner and type
        if( $workspace->id && $workspace->user_id != Auth::id() ){
            abort(403);
        }

        $keywords = $request->input('q');
        $query = Task::query();
        
        if( $keywords ){
            $query->search( $keywords );
        }
        
        //get tasks
        $tasks = $query->where('workspace_id', $workspace->id)->orderBy('id', 'ASC')->paginate(10);
       
        return view('tasks.index', compact('workspace', 'tasks', 'keywords'));
    }


    /**
     * Create new Task
     *
     * @param Request $request
     * @param Workspace $workspace
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function new(Request $request, Workspace $workspace)
    {
        //Create new workspace
        $task = new Task();

    	return $this->edit($request, $workspace, $task);
    }


    /**
     * Edit Workspace
     *
     * @param Request $request
     * @param Workspace $workspace
     * @param Task $task
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Request $request, Workspace $workspace, Task $task)
    {
        //check ownership
        if( $workspace->id && $workspace->user_id != Auth::id() ){
            abort(403);
        }

        //check ownership
        if( $task->id && $task->user_id != Auth::id() ){
            abort(403);
        }
        
        //get projects
        $projects = Project::where('workspace_id', $workspace->id)->orderBy('name', 'ASC')->get();
        
        return view('tasks.edit', compact('workspace', 'task', 'projects'));
    }


    /**
     * Save a newly created Task
     *
     * @param Request $request
     * @param Workspace $workspace
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request, Workspace $workspace){
        $task = new Task();

        return $this->update($request, $workspace, $task);
    }


    /**
     * Update the specified Task
     *
     * @param Request $request
     * @param Workspace $workspace
     * @param Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Workspace $workspace, Task $task)
    {
        //check ownership
        if( $workspace->id && $workspace->user_id != Auth::id() ){
            abort(403);
    	}

    	//check ownership
    	if( $task->id && $task->user_id != Auth::id() ){
    	    abort(403);
    	}
    	
    	$request->validate([
    	    'title' => 'required',
    	    'project_id' => 'required',
		]);

    	//only on create
    	if( empty( $task->id ) ){
    	    $task->workspace_id = $workspace->id;
    	    $task->user_id = Auth::id();
    	}

    	$task->project_id = $request->input('project_id');
    	$task->title = $request->input('title');
    	$task->description = $request->input('description');
    	$task->issue_link = $request->input('issue_link');
    	$task->pr_link = $request->input('pr_link');

    	$task->save();

    	return redirect()->route('tasks.index', [$workspace])->with('status', __('Task has been created successfully.'));
    }


    /**
     * Delete Task
     *
     * @param Workspace $workspace
     * @param Task $task
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function delete(Request $request, Workspace $workspace, Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

    	return redirect()->route('tasks.index')->with('status', __('Task has been deleted successfully.'));
    }
}
