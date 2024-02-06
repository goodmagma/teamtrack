<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

/**
 * Home Controller
 * 
 * @author Denis
 */
class HomeController extends Controller {
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
     * Show the application home.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        
        $workspace = $user->workspaces()->first();
        
        if( empty( $workspace ) ){
            return redirect()->route('workspaces.new');
        }
        
        return redirect()->route('workspaces.dashboard', $workspace);
    }

}
