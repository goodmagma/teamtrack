<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workspace;
use App\Models\Project;
use App\Models\WorkSession;

/**
 * Report Controller
 * 
 * @author Denis
 */
class ReportController extends Controller {
    
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
     * List Reports
     *
     * @param Request $request
     * @param Workspace $workspace
     * @param Project $project
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request, Workspace $workspace)
    {
        //get projects
        $workSessions = WorkSession::where('workspace_id', $workspace->id)->paginate(10);
        
        return view('reports.index', compact('workspace', 'workSessions'));
    }

}
