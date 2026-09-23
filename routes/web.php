<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\logincontroller;

Route::get('/','App\Http\Controllers\logincontroller@index');
Route::post('/login','App\Http\Controllers\logincontroller@aksilogin');

Route::get('/home','App\Http\Controllers\logincontroller@home');
Route::get('/logout','App\Http\Controllers\logincontroller@logout');

Route::get('/girasya','App\Http\Controllers\logincontroller@tampil');
Route::post('/input','App\Http\Controllers\logincontroller@zano');
