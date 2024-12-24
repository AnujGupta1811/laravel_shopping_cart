<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\FacebookLoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ApiController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
 
Route::get('/',[LoginController::class,'index']);

Route::get('/product-list', function () {
    return view('product-list');
});
Route::get('product-details',function(){
    return view('product-details');
});
Route::get('my-account',function(){
    return view('my-account');
});
Route::get('contact',function(){
    return view('contact');
});
Route::get('cart',function(){
    return view('cart');
});
Route::get('login', function () {
    return view('login');
});
Route::get('register',function(){
    return view('register');
});
Route::post('register-form',[LoginController::class,'registerform']);
Route::post('login-form',[LoginController::class,'loginform'])->name('login-form');
Route::get('logout',[LoginController::class,'logout']);
Route::get('/categories', [LoginController::class, 'index'])->name('home');
Route::get('/products', [LoginController::class, 'PostByCategory']);

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::get('/login/google', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.login');

Route::get('/login/google/callback', [GoogleLoginController::class, 'handleGoogleToken']);


Route::get('/login/facebook', [FacebookLoginController::class, 'redirectToFacebook'])->name('facebook.login');
Route::get('/login/facebook/callback', [FacebookLoginController::class, 'handleFacebookToken']);