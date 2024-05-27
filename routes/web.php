<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::resource('posts', PostController::class);

Route::post('comments/create', [CommentController::class, 'store'])->name('comments.store');

//php artisan make:model BookCategory -crR

//composer require laravel/ui
//php artisan ui bootstrap --auth
//npm run build
//chown -R www-data:www-data /var/www/storage
