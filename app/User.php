<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role' => 'integer'
    ];

    public function isUser(): bool
    {
        return $this->role === 0;
    }

    public function getLoginRediorectPath()
    {
        if ($this->isAdmin()) {
            return '/admin/dashboard';
        }
        return '/user/dashboard';
    }

    public function isAdmin(): bool
    {
        return $this->role === 1;
    }

}
