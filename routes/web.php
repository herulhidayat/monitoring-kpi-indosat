<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\KpiController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RencanaController;

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

// Dashboard
Route::middleware(['auth:sanctum', 'checkRole:Admin,SPV,CSO'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('/');
    Route::resource('dashboard', DashboardController::class);
});

// Rencana Buat Routes
Route::middleware(['auth', 'checkRole:Admin,SPV'])->group(function () {
    Route::get('/buat-rencana', [RencanaController::class, 'create'])->name('rencana.create');
    Route::post('/rencana/store', [RencanaController::class, 'store'])->name('rencana.store');
    Route::delete('/rencana/delete/{id}', [RencanaController::class, 'destroy'])->name('rencana.delete');
    Route::put('/rencana/edit/{id}', [RencanaController::class, 'update'])->name('rencana.update');
});

// Rencana Routes
Route::middleware(['auth', 'checkRole:Admin,SPV,CSO'])->group(function () {
    Route::get('/rencana-aktif', [RencanaController::class, 'index'])->name('rencana.index');
    Route::get('/rencana-selesai', [RencanaController::class, 'selesai'])->name('rencana.selesai');
    Route::put('/rencana/done/{id}', [RencanaController::class, 'done'])->name('rencana.done');
});

// Kpi Routes
Route::middleware(['auth', 'checkRole:Admin,SPV,CSO'])->group(function () {
    Route::resource('kpi-data', KpiController::class);
    Route::delete('/kpi-data/delete/{id}', [KpiController::class, 'destroy'])->name('kpi-data.delete');
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
Route::middleware(['auth', 'checkRole:Admin,SPV,CSO'])->group(function () {
    Route::resource('site-data', SiteController::class);
    Route::put('/site-data/edit/{id}', [SiteController::class, 'update'])->name('site-data.edit');
    Route::delete('/site-data/delete/{id}', [SiteController::class, 'destroy'])->name('site-data.delete');
    Route::get('/site-transaction', [SiteController::class, 'siteTransaction'])->name('site-data.siteTransaction');
});

// Outlet Routes
Route::middleware(['auth', 'checkRole:Admin,SPV,CSO'])->group(function () {
    Route::resource('outlet-data', OutletController::class);
    Route::put('/outlet-data/edit/{id}', [OutletController::class, 'update'])->name('outlet-data.edit');
    Route::get('/outlet-transaction', [OutletController::class, 'OutletTransaction'])->name('outlet-data.outletTransaction');
    Route::delete('/outlet-data/delete/{id}', [OutletController::class, 'destroy'])->name('outlet-data.delete');
});

// Import Routes
Route::middleware(['auth', 'checkRole:Admin,SPV'])->group(function () {
    Route::resource('import', ImportController::class);
    Route::post('import-kpi-outlet', [ImportController::class, 'importKpiOutlet'])->name('import-kpi-outlet');
    Route::post('import-site', [ImportController::class, 'importSite'])->name('import-site');
});

// User Routes
Route::middleware(['auth', 'checkRole:Admin'])->group(function () {
    Route::resource('user', UserController::class);
});

// Profile
Route::put('editProfile/{id}', [UserController::class, 'update'])->name('editProfile');
Route::put('editPassword/{id}', [UserController::class, 'changePassword'])->name('editPassword');

