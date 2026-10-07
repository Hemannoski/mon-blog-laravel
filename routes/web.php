<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;

Route::get('/', [BlogController::class, 'index'])->name('home');

Route::get('/register', [AuthController::class, 'showSignup'])->name('register');
Route::post('/register', [AuthController::class, 'Signup'])->name('registration.register');

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/dashboard', function(){return view('dashboard');})->name('dashboard')->middleware('auth');

Route::get('/create', [BlogController::class, 'readCategories'])->name('create')->middleware('auth');
Route::post('/create', [BlogController::class, 'createArticle'])->name('article.store')->middleware('auth');

Route::get('/dashboard', [BlogController::class, 'dashboardArticle'])->name('dashboard');
Route::get('/article/{id}/edit', [BlogController::class, 'dashboardArticleSingle'])->name('article.edit')->middleware('auth');

Route::delete('/articles/{id}', [BlogController::class, 'destroy'])->name('article.destroy')->middleware('auth');
Route::put('/article/{id}', [BlogController::class, 'update'])->name('article.update')->middleware('auth');
Route::get('/article/{id}', [BlogController::class, 'show'])->name('article.show')->middleware('auth');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show')->middleware('auth');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send')->middleware('auth');