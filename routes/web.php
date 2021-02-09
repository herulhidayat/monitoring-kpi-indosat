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
    return view('pages.dashboard');
});

Route::get('/site-data', function () {
    return view('pages.site-data');
});

Route::get('/site-transaction', function () {
    return view('pages.site-transaction');
});

Route::get('/outlet-data', function () {
    return view('pages.outlet-data');
});

Route::get('/outlet-transaction', function () {
    return view('pages.outlet-transaction');
});