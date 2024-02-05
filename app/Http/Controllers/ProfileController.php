<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Profile Controller
 * 
 * @author Denis
 */
class ProfileController extends Controller {

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
     * Edit Profile
     * 
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit()
    {
    	return view('profile.edit');
    }
    
    
    /**
     * Update profile
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
    	$user = auth()->user();

    	$request->validate([
			'firstname' => 'required',
    		'lastname' => 'required',
    		'email' => 'required|email|unique:users,email,' . $user->id,
			'locale' => 'required'
		]);

    	$user->firstname = $request->input('firstname');
    	$user->lastname = $request->input('lastname');
    	$user->email = $request->input('email');
    	$user->locale = $request->input('locale');

    	$user->save();

    	return redirect()->back()->with('status', __('Your profile has been updated successfully.'));
    }
    
    
    /**
     * Update password
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function passwordUpdate(Request $request)
    {
    	$user = auth()->user();
    	
    	$request->validate([
    	    'password' => 'required|string|min:6|confirmed',
    	]);
    	
    	if($request->input('password')){
    	    $user->password = bcrypt($request->input('password'));
    	}
    	
    	$user->save();
    	
    	return redirect()->back()->with('status', __('Your password has been updated successfully.'));
    }
    
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function themeSwitch()
    {
    	$user = auth()->user();
    	$user->theme_dark = !$user->theme_dark;
    	$user->save();

    	return redirect()->back()->with('status', __('Theme Switched Successfully.'));
    }
    
    
    /**
     * Leave Impersonation
     *
     * @return
     */
    public function leaveImpersonation()
    {
        auth()->user()->leaveImpersonation();
        
        return redirect()->route('dashboard');
    }

}
