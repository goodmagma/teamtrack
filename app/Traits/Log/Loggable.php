<?php

namespace App\Traits\Log;

use Illuminate\Support\Facades\Log;


/**
 * Traits for allow logging both console and file
 * 
 * @copyright Riktam Technologies
 * @author Siddhartha Kongara
 */
trait Loggable {
	
	/**
	 * Log Debug
	 * 
     * @param string $format
     * @param mixed $values 
	 */
    protected static function logDebug($format, mixed ...$values) {
        $message = sprintf($format, ...$values);
        
    	Log::debug($message);
    	
    	if (app()->runningInConsole()) {
    		$datetime = date('Y-m-d H:i:s');
    		app('consoleOutput')->writeln("<comment>[$datetime] $message</comment>");
    	}
    }

    
    /**
     * Log Info
     * 
     * @param string $format
     * @param mixed $values 
     */
    protected static function logInfo($format, mixed ...$values) {
        $message = sprintf($format, ...$values);
        
    	Log::info($message);
    	
    	if (app()->runningInConsole()) {
    		$datetime = date('Y-m-d H:i:s');
    		app('consoleOutput')->writeln("<info>[$datetime] $message</info>");
    	}
    }

    
    /**
     * Log Warning
     * 
     * @param string $format
     * @param mixed $values 
     */
    protected static function logWarning($format, mixed ...$values) {
        $message = sprintf($format, ...$values);
        
    	Log::warning($message);

    	if (app()->runningInConsole()) {
        	$datetime = date('Y-m-d H:i:s');
        	app('consoleOutput')->writeln("<comment>[$datetime] $message</comment>");
    	}
    }

    
    /**
     * Log Error
     * 
     * @param string $format
     * @param mixed $values 
     */
    protected static function logError($format, mixed ...$values) {
        $message = sprintf($format, ...$values);
        
    	Log::error($message);
    	
    	if (app()->runningInConsole()) {
       		$datetime = date('Y-m-d H:i:s');
       		app('consoleOutput')->writeln("<error>[$datetime] $message</error>");
    	}
    }
}
