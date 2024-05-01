<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/amp', [\App\Http\Controllers\AMP\HomeController::class, 'home'])->name('amp.home');
Route::get('/shop/amp', [\App\Http\Controllers\AMP\ProductController::class, 'shop'])->name('amp.shop');
Route::get('/blog/amp', [\App\Http\Controllers\AMP\PostController::class, 'blog'])->name('amp.blog');
Route::get('/blog/{url}/amp', [\App\Http\Controllers\AMP\PostController::class, 'post'])->name('amp.post');
Route::get('/shop/{url}/amp', [\App\Http\Controllers\AMP\ProductController::class, 'product'])->name('amp.product');
Route::get('/shop/{url}/amp/{ignorea?}/{ignoreb?}/{ignorec?}', [\App\Http\Controllers\AMP\ProductController::class, 'redirectToProduct'])->name('amp.redirectToProduct');
Route::get('/forum/{url}/amp', [\App\Http\Controllers\AMP\TopicController::class, 'topic'])->name('amp.topic');
Route::get('/products/cat/{main_cat}/amp', [\App\Http\Controllers\AMP\CategoryController::class, 'categoryProduct']);
Route::get('/products/cat/{main_cat}/{sub_cat}/amp', [\App\Http\Controllers\AMP\CategoryController::class, 'subcategoryProduct']);
Route::get('/products/cat/{main_cat}/{sub_cat}/{child_cat}/amp', [\App\Http\Controllers\AMP\CategoryController::class, 'childcategoryProduct']);
