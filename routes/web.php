<?php

use App\Http\Controllers\Admin\Master\DaftarApprovalMrController;
use App\Http\Controllers\Admin\Master\DaftarHistoryApprovalMrController;
use App\Http\Controllers\Admin\Master\DaftarMaterialController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CVController;
use App\Http\Requests\CreatDaftarMrRequest;
use App\Http\Requests\CreatDaftarPoRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//
Route::get('/cv', [CVController::class, 'showCV'])->name('cv');
Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');

//prosess approve
Route::get('/approval_mr', [DaftarApprovalMrController::class, 'index'])->name('approval_mr.index');
Route::get('/history_approve', [DaftarHistoryApprovalMrController::class, 'index'])->name('history_approve.index');
Route::get('/daftar_mr/detail-approval/{no_po}', [DaftarApprovalMrController::class, 'detailApprovalMR'])
    ->name('daftar_mr.detail_approval');
Route::post('/daftar_mr/approve/{no_po}', [DaftarApprovalMrController::class, 'approveMR'])
    ->name('daftar_mr.approve');

//master
Route::post('register', [RegisteredUserController::class, 'store']);
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::group(['prefix' => 'master', 'as' => 'master.', 'namespace' => 'Master', 'middleware' => ['auth']], function () {
        Route::resource('daftar_material', 'DaftarMaterialController');
        Route::resource('daftar_mr', 'DaftarMrController');
        Route::resource('daftar_po', 'DaftarPoController');
    });
    Route::group(['prefix' => 'master', 'as' => 'master.', 'middleware' => ['auth']], function () {
        Route::get('index', [CreatDaftarMrRequest::class, 'index'])->name('index');
        Route::get('create', [CreatDaftarMrRequest::class, 'create'])->name('create');
        Route::post('store', [CreatDaftarMrRequest::class, 'create'])->name('store');
    });
    Route::group(['prefix' => 'master', 'as' => 'master.', 'middleware' => ['auth']], function () {
        Route::get('index', [CreatDaftarPoRequest::class, 'index'])->name('index');
        Route::get('create', [CreatDaftarPoRequest::class, 'create'])->name('create');
        Route::post('store', [CreatDaftarPoRequest::class, 'create'])->name('store');
    });
});

require __DIR__ . '/auth.php';
