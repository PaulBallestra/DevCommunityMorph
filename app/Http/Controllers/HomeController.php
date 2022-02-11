<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $posts = Post::all()->sortByDesc('created_at');
        $likes = Like::all();

        return view('dashboard', compact('posts', 'likes'));
    }
}
