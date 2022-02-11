<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //Function like polymorphisme
    public function like(Request $request, Comment $comment){

        //Si déjà liké
        if($comment->hasLiked()){
            return redirect()->back()->withError('Déjà liké !');
        }

        //LIKE
        $comment->likes()->create([
            'user_id' => $request->user()->id
        ]);

        return redirect()->back();

    }

}
