<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo'
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
    ];

    /**
     * Return relationship of user to a post
     *
     * @return
     * 
     */
    public function post()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Return relationship of user to like model
     *
     * @return
     * 
     */
    public function like()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Return relationship of user to comment
     *
     * @return
     * 
     */
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Return relationship of user to follow
     *
     * @return
     * 
     */
    public function follow()
    {
        return $this->hasMany(Follow::class);
    }
    
}
