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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('pages.dashboard');
})->name('dashboard');

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

Route::get('/kpi-score', function () {
    return view('pages.kpi-score');
});
Route::get('/kpi-msa', function () {
    return view('pages.kpi-msa');
});
Route::get('/kpi-omb', function () {
    return view('pages.kpi-omb');
});
Route::get('/kpi-qsso', function () {
    return view('pages.kpi-qsso');
});
Route::get('/kpi-quro', function () {
    return view('pages.kpi-quro');
});
Route::get('/kpi-rguga', function () {
    return view('pages.kpi-rguga');
});
Route::get('/kpi-ssohvc', function () {
    return view('pages.kpi-ssohvc');
});
Route::get('/kpi-nom', function () {
    return view('pages.kpi-nom');
});

Route::get('/import', function () {
    return view('pages.import');
});


