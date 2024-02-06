<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model {

    use SoftDeletes;
    
	protected $table = 'projects';
	
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

}
