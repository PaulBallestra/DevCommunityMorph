<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    //Store
    public function store(Request $request){

        $request->validate([
            'body' => 'required|string|max:255',
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'body' => $request->input('body')
        ]);

        return redirect()->back();
    }

    //Function like polymorphisme
    public function like(Request $request, Post $post){

        //Si déjà liké
        if($post->hasLiked()){
            return redirect()->back()->withError('Déjà liké !');
        }

        //LIKE
        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        return redirect()->back();

    }

    //Function comment
    public function comment(Request $request, Post $post){

        //dd($request, $post);

        //Validate du body du comment
        $request->validate([
            'body' => 'required|string|max:255',
        ]);

        //Création du post
        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'body' => $request->input('body')
        ]);

        return redirect()->back();
    }

}
