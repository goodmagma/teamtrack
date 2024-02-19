<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Workspace;
use App\Models\Project;

/**
 * Project Controller
 * 
 * @author Denis
 */
class ProjectController extends Controller {

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
        $query = Project::query();
        
        if( $keywords ){
            $query->search( $keywords );
        }
        
        //get projects
        $projects = $query->where('workspace_id', $workspace->id)->orderBy('name', 'ASC')->paginate(10);
       
        return view('projects.index', compact('workspace', 'projects', 'keywords'));
    }


    /**
     * Create new Projects
     *
     * @param Request $request
     * @param Workspace $workspace
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function new(Request $request, Workspace $workspace)
    {
        //Create new workspace
        $project = new Project();

    	return $this->edit($request, $workspace, $project);
    }


    /**
     * Edit Project
     *
     * @param Request $request
     * @param Workspace $workspace
     * @param Project $project
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Request $request, Workspace $workspace, Project $project)
    {
        //check ownership
        if( $workspace->id && $workspace->user_id != Auth::id() ){
            abort(403);
        }

        //check ownership
        if( $project->id && $project->user_id != Auth::id() ){
            abort(403);
        }
        
        return view('projects.edit', compact('workspace', 'project'));
    }


    /**
     * Save a newly created Project
     *
     * @param Request $request
     * @param Workspace $workspace
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request, Workspace $workspace){
        $project = new Project();

        return $this->update($request, $workspace, $project);
    }


    /**
     * Update the specified Project
     *
     * @param Request $request
     * @param Workspace $workspace
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Workspace $workspace, Project $project)
    {
        //check ownership
        if( $workspace->id && $workspace->user_id != Auth::id() ){
            abort(403);
    	}

    	//check ownership
    	if( $project->id && $project->user_id != Auth::id() ){
    	    abort(403);
    	}
    	
    	$request->validate([
    	    'name' => 'required',
		]);

    	//only on create
    	if( empty( $project->id ) ){
    	    $project->workspace_id = $workspace->id;
    	    $project->user_id = Auth::id();
    	}

    	$project->name = $request->input('name');
    	$project->description = $request->input('description');

    	$project->save();

    	return redirect()->route('projects.index', [$workspace])->with('status', __('Project has been created successfully.'));
    }


    /**
     * Delete Project
     *
     * @param Workspace $workspace
     * @param Project $project
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function delete(Request $request, Workspace $workspace, Project $project)
    {
        $this->authorize('delete', $project);

        $project->delete();

    	return redirect()->route('projects.index')->with('status', __('Project has been deleted successfully.'));
    }
}
