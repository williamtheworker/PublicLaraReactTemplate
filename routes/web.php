<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
    // return view('welcome');
});

Route::get('/login', 'Auth\AuthController@login')->name('login');

Route::get('logout', 'Auth\AuthController@logout');

Route::post('/login/authenticate', 'Auth\AuthController@authenticate');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('/admin/dashboard');
    })->name('dashboard');

    Route::get('basic_table', function () {
        return view('/admin/basic_table');
    });

    Route::get('intermediate_table', function () {
        return view('/admin/intermediate_table');
    });

    Route::get('input_samples', function () {
        return view('/admin/input_samples');
    });
});