<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'body'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Counter likes
    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function hasLiked()
    {
        return $this->likes->where('user_id', Auth::user()->id)->count();
    }

}
