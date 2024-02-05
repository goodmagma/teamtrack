<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


/**
 * Pages Controller
 * 
 * @author Denis
 */
class PagesController extends Controller {
    
    /**
     * Render Page
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function page(Request $request, $page)
    {
    	$view = "pages." . $page;
    	
    	if (view()->exists($view)) {
    		return view($view);
    	}
    	
    	abort(404);
    }

}
