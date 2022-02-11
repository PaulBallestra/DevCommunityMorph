<?php


namespace App\Models;


use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;

trait Likable
{

    // Post ::withLikes()->get();
    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select post_id, sum(liked) likes,
                    sum(!liked) dislikes from likes group by post_id',
            'likes',
            'likes.post_id',
            'posts.id'
        );

    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('post_id', $this->id)
            ->where('liked', false)
            ->count();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('post_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : Auth::id(),
        ], [
            'liked' => $liked,
        ]);
    }

}
