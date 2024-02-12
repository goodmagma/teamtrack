<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkSession extends Model {

    use SoftDeletes;
    
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
}
