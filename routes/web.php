<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\KpiController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;

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

// Kpi Routes
Route::middleware(['auth', 'checkRole:Admin'])->group(function () {
    Route::resource('kpi-data', KpiController::class);
    Route::get('/kpi-msa', [KpiController::class, 'msa'])->name('kpi-data.msa');
    Route::get('/kpi-omb', [KpiController::class, 'omb'])->name('kpi-data.omb');
    Route::get('/kpi-qsso', [KpiController::class, 'qsso'])->name('kpi-data.qsso');
    Route::get('/kpi-quro', [KpiController::class, 'quro'])->name('kpi-data.quro');
    Route::get('/kpi-sc', [KpiController::class, 'sc'])->name('kpi-data.sc');
    Route::get('/kpi-ssohvc', [KpiController::class, 'ssohvc'])->name('kpi-data.ssohvc');
    Route::get('/kpi-sqsso', [KpiController::class, 'sqsso'])->name('kpi-data.sqsso');
    Route::get('/kpi-ssc', [KpiController::class, 'ssc'])->name('kpi-data.ssc');
});

// Site Routes
Route::middleware(['auth', 'checkRole:Admin'])->group(function () {
    Route::resource('site-data', SiteController::class);
    Route::get('/site-transaction', [SiteController::class, 'siteTransaction'])->name('site-data.siteTransaction');
});

// Outlet Routes
Route::middleware(['auth', 'checkRole:Admin'])->group(function () {
    Route::resource('outlet-data', OutletController::class);
    Route::get('/outlet-transaction', [OutletController::class, 'OutletTransaction'])->name('outlet-data.outletTransaction');
});

// Import Routes
Route::middleware(['auth', 'checkRole:Admin'])->group(function () {
    Route::resource('import', ImportController::class);
    Route::post('import-kpi-outlet', [ImportController::class, 'importKpiOutlet'])->name('import-kpi-outlet');
    Route::post('import-site', [ImportController::class, 'importSite'])->name('import-site');
});


