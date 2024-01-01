<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('blogs', \App\Http\Controllers\BlogController::class);


// 구독과 취소
Route::controller(\App\Http\Controllers\SubscribeController::class)->group(function () {
    Route::post('subscribe', 'store')
        ->name('subscribe');
    Route::post('unsubscribe', 'destroy')
        ->name('unsubscribe');
});

Route::resource('blogs.posts', \App\Http\Controllers\PostController::class)
    ->shallow();

    
Route::resource('posts.comments', \App\Http\Controllers\CommentController::class)
->shallow()
->only(['store', 'update', 'destroy']);


Route::resource('posts.attachments', \App\Http\Controllers\AttachmentController::class)
    ->shallow()
    ->only(['store', 'destroy']);