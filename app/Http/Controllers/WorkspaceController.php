<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Workspace;

/**
 * Accounts Controller
 * 
 * @author Denis
 */
class WorkspaceController extends Controller {
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
     * Show Workspace Dashboard
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function switch(Request $request, Workspace $workspace)
    {
        //check ownership
        if( $workspace->id && $workspace->user_id != Auth::id() ){
            abort(403);
        }
        
        $user = Auth::user();
        $user->workspace_id = $workspace->id;
        $user->save();
        
        return redirect()->route('workspaces.dashboard', $workspace);
    }
    

    /**
     * Show Workspace Dashboard
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function dashboard(Request $request, Workspace $workspace)
    {
        //check ownership
        if( $workspace->id && $workspace->user_id != Auth::id() ){
            abort(403);
        }

        //get workspaces
        $workspaces = Workspace::where('user_id', Auth::id())->orderBy('name', 'ASC')->paginate(10);

        if( count( $workspaces ) > 0 ) {
    		return view('workspaces.dashboard', compact('workspace'));
    	}
    	else {
    	    return redirect()->route('workspaces.new');
    	}
    }


    /**
     * Create new Workspace
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function new(Request $request)
    {
        //Create new workspace
    	$workspace = new Workspace();

    	return $this->edit($request, $workspace);
    }


    /**
     * Edit Workspace
     *
     * @param Workspace $workspace
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(Request $request, Workspace $workspace)
    {
        //check ownership
        if( $workspace->id && $workspace->user_id != Auth::id() ){
            abort(403);
        }

    	return view('workspaces.edit', array(
    	    'workspace' => $workspace,
    	));
    }


    /**
     * Save a newly created Account
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request){
        $workspace = new Workspace();

        return $this->update($request, $workspace);
    }


    /**
     * Update the specified account
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Workspace $workspace)
    {
        //check ownership
        if( $workspace->id && $workspace->user_id != Auth::id() ){
            abort(403);
    	}

    	//new item = insert?
    	$isNew = empty($workspace->id);

    	$request->validate([
    	    'name' => 'required',
		]);

    	//only on create
    	if( empty( $workspace->id ) ){
    	    $workspace->user_id = Auth::id();
    	}

    	$workspace->name = $request->input('name');

    	$workspace->save();

    	return redirect()->route('workspaces.dashboard', [$workspace])->with('status', __('Workspace has been created successfully.'));
    }


    /**
     * Delete Workspace
     *
     * @param Workspace $workspace
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function delete(Request $request, Workspace $workspace)
    {
        $this->authorize('delete', $workspace);

        $workspace->delete();

    	return redirect()->route('dashboard')->with('status', __('Workspace has been deleted successfully.'));
    }
}
