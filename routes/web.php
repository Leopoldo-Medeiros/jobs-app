<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

Route::view('/', 'home');
Route::view('/contact', 'contact');

// Define resource routes with custom names
Route::resource('jobs', JobController::class)->names([
    'index' => 'index',
    'create' => 'create',
    'store' => 'store',
    'show' => 'show',
    'edit' => 'edit',
    'update' => 'update',
    'destroy' => 'destroy',
]);
