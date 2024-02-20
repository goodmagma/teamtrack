<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class WorkSession extends Model {

	protected $table = 'work_sessions';
	
	protected $casts = [
	    'started_at'   => 'datetime',
	    'ended_at'   => 'datetime',
	    'paused_at'   => 'datetime',
	];

	
	/**
	 * Get User
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function user()
	{
	    return $this->belongsTo(User::class);
	}
	
	/**
	 * Get Workspace
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function workspace()
	{
	    return $this->belongsTo(Workspace::class);
	}

	/**
	 * Get Project
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function project()
	{
	    return $this->belongsTo(Project::class);
	}

	/**
	 * Get Task
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function task()
	{
	    return $this->belongsTo(Task::class);
	}
	
	/**
	 * ATTRIBUTES
	 */
	public function liveDuration(): Attribute
	{
	    $duration = $this->started_at->diffInSeconds(Carbon::now());
	    
	    if( !empty( $this->paused_at ) ){
	        $duration = $duration - $this->paused_at->diffInSeconds(Carbon::now());
	    }
	    else{
	        $duration = $duration - $this->pause_duration;
	    }

	    return Attribute::make(
	        get: fn () => $duration
        );
	}
	
	public function isPaused(): Attribute
	{
	    return Attribute::make(
	        get: fn () => $this->paused_at !== null
        );
	}
	
	/**
	 * SCOPES
	 */
	public function scopeIsRunning($query)
	{
	    return $query->whereNull('ended_at');
	}

	public function scopeIsCompleted($query)
	{
	    return $query->whereNotNull('ended_at');
	}
	
	public function scopeCreatedToday($query)
	{
	    return $query->where('created_at', '>=', Carbon::today());
	}
	
	public function scopeCompletedToday($query)
	{
	    return $query->where('ended_at', '>=', Carbon::today());
	}

}
