<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserprofilController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mentions', function () {
    return view('mentions');
});

//Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth'])->name('dashboard');
Route::get('/profil', function () { return view('profil'); })->middleware(['auth'])->name('profil');
Route::get('/dashboard', [HomeController::class, 'dashboard' ])->name('dashboard')->middleware(['auth']);

Route::post('/posts',  [PostsController::class, 'store' ])->name('posts');

Route::get('/edit/{id}', [UserprofilController::class, 'edit' ])->name('editprofil')->middleware(['auth']);
Route::put('/edit/{id}', [UserprofilController::class, 'update' ])->name('update');

//Likes
Route::post('/posts/{post}/like', [PostsController::class, 'like'])->middleware(['auth'])->name('posts.like');

//Comments
Route::post('/posts/{post}/comment', [PostsController::class, 'comment'])->middleware(['auth'])->name('posts.comment');

require __DIR__.'/auth.php';
