<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    /**
     * Return relationship of a post to a user
     *
     * @return
     * 
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return relationship of a post to like model
     *
     * @return
     * 
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Return if auth user liked a post
     *
     * @param User $user
     * 
     * @return
     * 
     */
    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    /**
     * Return likes count of a post
     *
     * @param Post $post
     * 
     * @return
     * 
     */
    public function likesCount(Post $post)
    {
        return Like::where('post_id', $post->id)->count();
    }
    
    /**
     * Return relationship of a post to comment
     *
     * @return
     * 
     */
    public function comment()
    {
        return $this->hasMany(Commment::class);
    }

    public static function comments(Post $post)
    {
        return Comment::select('comments.*', 'users.name')
            ->leftJoin('users', 'users.id', '=', 'comments.user_id')
            ->where('post_id', $post->id)
            ->orderBy('comments.id', 'desc')
            ->get();
    }

    public function commentOwner(Post $post)
    {
        return Comment::with('user', 'post')->get();
    }

}
