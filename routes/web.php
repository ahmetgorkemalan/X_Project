<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileEditController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('registerpage', function () {
    return view('registerpage');
})->name('registerpage');
Route::get('home', function () {
    return view('home');
})->name('home');
Route::get('profile', function () {
    return view('profile');
})->name('profile');
Route::get('settings', function () {
    return view('settings');
})->name('settings');

Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::post('infoupdate', [ProfileEditController::class, 'infoupdate'])->name('infoupdate');
Route::post('edituserphoto', [ProfileEditController::class, 'edituserphoto'])->name('edituserphoto');
Route::post('passwordupdate', [ProfileEditController::class, 'passwordupdate'])->name('passwordupdate');
Route::post('deleteaccount', [ProfileEditController::class, 'deleteaccount'])->name('deleteaccount');

Route::post('addpost', [PostController::class, 'addpost'])->name('addpost');
Route::get('home', [PostController::class, 'homeshowposts'])->name('home');
Route::post('deletepost/{post}', [PostController::class, 'deletepost'])->name('deletepost');
Route::post('editpost/{post}', [PostController::class, 'editpost'])->name('editpost');
Route::post('addremovelike/{post}', [PostController::class, 'addremovelike'])->name('addremovelike');

Route::post('addcomment/{post}', [CommentController::class, 'addcomment'])->name('addcomment');
Route::get('home', [CommentController::class, 'getcomment'])->name('home');
Route::post('deletecomment/{comment}', [CommentController::class, 'deletecomment'])->name('deletecomment');
Route::post('editcomment/{comment}', [CommentController::class, 'editcomment'])->name('editcomment');