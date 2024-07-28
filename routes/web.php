<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

//home page
Route::get('/', [ListingController::class,'index'])->middleware('auth');

//Show listing create form
Route:: get('/listings/create',[ListingController::class,'create'])->middleware('auth');

//Store listing data
Route::post('/listings/store',[ListingController::class,'store'])->middleware('auth');


//login route
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate',[UserController::class,'authenticate'])->middleware('guest');

//edit page
Route::get('/listings/{listing}/edit',[ListingController::class,'edit'])->middleware('auth');

//Edit or update submit  Listing data
Route::put('/listings/{listing}/update',[ListingController::class,'update'])->middleware('auth');

//Delete  listing
Route::delete('/listings/{listing}/delete',[ListingController::class,'destroy'])->middleware('auth');

//Show rigister/create Form
Route::get('/register',[UserController::class,'register'])->middleware('guest');

//Create new user
Route::post('/users',[UserController::class,'store'])->middleware('guest');

//Log user out
Route::post('/logout',[UserController::class,'logout'])->middleware('auth');