<?php

namespace App\Http\Controllers;

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

        return redirect('/dashboard');
    }

    //Function like
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
    public function comment(Request $request, Post $psot){

        dd('pute');

    }

}
