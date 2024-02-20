<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Workspace extends Model {

    use HasUlids;
    use SoftDeletes;
    
	protected $table = 'workspaces';

	
	/**
	 * Return Avatar Initials
	 *
	 * @return string
	 */
	public function getInitials(){
	    return Str::of($this->name)
	    ->explode(' ') // Split the name into parts
	    ->map(fn($part) => Str::of($part)->substr(0, 1)->upper()) // Take the first letter and uppercase it
	    ->join(''); // Join the initials together
	}
	
	
	/**
	 * Return true if has running working sessions
	 */
	public function hasRunningWorkSessions(){
	    return WorkSession::where('workspace_id', $this->id)->isRunning()->count() > 0;
	}
}
