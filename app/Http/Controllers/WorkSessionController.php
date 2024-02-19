<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WorkSession;
use App\Models\Workspace;

/**
 * Task Controller
 * 
 * @author Denis
 */
class WorkSessionController extends Controller {

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
     * Edit WorkSession
     *
     * @param Request $request
     * @param Workspace $workspace
     * @param WorkSession $workSession
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Request $request, Workspace $workspace, WorkSession $workSession)
    {
        //check ownership
        if( $workSession->id && $workSession->user_id != Auth::id() ){
            abort(403);
        }
       
        return view('worksessions.edit', compact('workspace', 'workSession'));
    }


    /**
     * Update the specified WorkSession
     *
     * @param Request $request
     * @param Workspace $workspace
     * @param WorkSession $workSession
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Workspace $workspace, WorkSession $workSession)
    {
        //check ownership
        if( $workSession->id && $workSession->user_id != Auth::id() ){
            abort(403);
        }

    	$request->validate([
    	    'project_id' => 'required',
    	    'started_at' => 'required',
    	    'ended_at' => 'required',
    	    'description' => 'required',
		]);

    	$workSession->project_id = $request->input('project_id');
    	$workSession->description = $request->input('description');

    	$task->save();

    	return redirect()->back()->with('status', __('Task has been created successfully.'));
    }


    /**
     * Delete Work Session
     *
     * @param Workspace $workspace
     * @param WorkSession $workSession
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function delete(Request $request, Workspace $workspace, WorkSession $workSession)
    {
        //check ownership
        if( $workSession->id && $workSession->user_id != Auth::id() ){
            abort(403);
        }
        
        $this->authorize('delete', $workSession);

        $workSession->delete();

    	return redirect()->back()->with('status', __('Work Session has been deleted successfully.'));
    }
}
