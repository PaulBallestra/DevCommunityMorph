<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mentions', function () {
    return view('mentions');
});

//Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth'])->name('dashboard');
Route::get('/profil', function () { return view('profil'); })->middleware(['auth'])->name('profil');
Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'dashboard' ])->name('dashboard')->middleware(['auth']);

Route::post('/posts',  [\App\Http\Controllers\PostsController::class, 'store' ])->name('posts');

Route::get('/edit/{id}', [\App\Http\Controllers\UserprofilController::class, 'edit' ])->name('editprofil')->middleware(['auth']);
Route::put('/edit/{id}', [\App\Http\Controllers\UserprofilController::class, 'update' ])->name('update');

//Like
Route::post('/posts/{post}/like', [\App\Http\Controllers\PostsController::class, 'like'])->middleware(['auth'])->name('posts.like');


//Route::post('contact', [\App\Http\Controllers\ContactController::class, 'store' ]) ->name('store');
require __DIR__.'/auth.php';
