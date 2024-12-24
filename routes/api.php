<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\FacebookLoginController;


Route::get('category', [ApiController::class, 'datasend']);
Route::get('products', [ApiController::class, 'product']);
Route::get('products/{categoryId}', [ApiController::class, 'productsByCategory']);
Route::get('/product/{id}', [ApiController::class, 'productsById']); 

Route::post('login', [ApiController::class, 'login']);
Route::post('register', [ApiController::class, 'register']);
Route::post('verify-email', [ApiController::class, 'verifyEmail']);

//Login With Google
Route::post('google/token', [GoogleLoginController::class, 'handleGoogleToken']);

//Login With Facebook
Route::post('facebook/token', [FacebookLoginController::class, 'handleFacebookToken']);

Route::middleware('auth:sanctum')->post('/cart/{id}', [ApiController::class, 'addToCart']);