<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Lab404\Impersonate\Models\Impersonate;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable {
	use SoftDeletes;

	use HasApiTokens, HasFactory, Notifiable;
	use HasRoles {
		hasPermissionTo as traitHasPermissionTo;
	}
	use Impersonate;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var string[]
	 */
	protected $fillable = [
			'firstname',
			'lastname',
			'email',
			'password',
			'locale'
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array
	 */
	protected $hidden = [
			'password',
			'remember_token',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array
	 */
	protected $casts = [
			'email_verified_at' => 'datetime',
	];


	/**
	 * Return Avatar Initials
	 *
	 * @return string
	 */
	public function getInitials(){
		return strtoupper( substr($this->firstname, 0, 1) . substr($this->lastname, 0, 1) );
	}


    /**
     * Return the user main role
     * @return string
     */
    public function getMainRole(){
        if( $this->isAdmin() ){
			return "Administrator";
		}

		return "User";
    }
	

	/**
	 * True if user is an Administrator
	 *
	 * @return boolean
	 */
	public function isAdmin()
	{
		return $this->hasRole('administrator');
	}

	public function workspace()
	{
	    return $this->belongsTo(Workspace::class, 'workspace_id');
	}
	
	/**
	 * 
	 * @return HasMany
	 */
	public function workspaces(): HasMany
	{
	    return $this->hasMany(Workspace::class);
	}

	/**
	 * 
	 * @return HasMany
	 */
	public function tasks(): HasMany
	{
	    return $this->hasMany(Task::class);
	}
	
	/**
	 * SCOPES
	 */
	public function scopeHasRoleAdmin($query)
	{
	    return $query->role('administrator');
	}
	
	
	/**
	 *
	 * @param $query
	 * @param $keywords
	 * @return $query
	 */
	public function scopeSearch($query, $keywords)
	{
		return $query->where('firstname', 'LIKE', '%'.$keywords.'%')->orWhere('lastname', 'LIKE', '%'.$keywords.'%')->orWhere('email', 'LIKE', '%'.$keywords.'%');
	}
}
