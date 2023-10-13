<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles {
        hasPermissionTo as traitHasPermissionTo;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
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
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
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
        return $this->isAdmin() ? 'Administrator' : 'User';
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
    
    
    
}
