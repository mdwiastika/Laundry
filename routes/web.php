<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\OutletController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\User\HistoryController;
use App\Http\Controllers\User\HomepageController;
use App\Http\Controllers\User\PaketController as UserPaketController;
use App\Http\Controllers\User\TransaksiController as UserTransaksiController;
use App\Http\Controllers\User\UserController as UserUserController;
use Illuminate\Support\Facades\Route;

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
    return redirect('dashboard');
});
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'checkLogin'])->name('check-login');
    Route::post('/register', [AuthController::class, 'postRegister'])->name('post-register');
});
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('dashboard_ok');
    Route::resource('/user', UserController::class)->middleware('user_ok');
    Route::resource('/paket', PaketController::class)->middleware('paket_ok');
    Route::resource('/member', MemberController::class)->middleware('member_ok');
    Route::resource('/outlet', OutletController::class)->middleware('outlet_ok');
    Route::resource('/transaksi', TransaksiController::class)->middleware('transaksi_ok');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan')->middleware('dashboard_ok');
    Route::get('/print-laporan', [LaporanController::class, 'print'])->name('print-laporan-transaksi');
    Route::get('/get-paket-by-member/{id_member}', [TransaksiController::class, 'getPaket']);
    Route::get('/get-user-ajax', [UserController::class, 'getAjax'])->name('get-user-datatable');
    Route::middleware('is_member')->group(function () {
        Route::get('home', [HomepageController::class, 'index'])->name('home');
        Route::get('/all-paket', [UserPaketController::class, 'index'])->name('paket-user');
        Route::get('/all-history', [HistoryController::class, 'index'])->name('history-user');
        Route::post('/user-transaksi', [UserTransaksiController::class, 'store'])->name('user-transaksi');
        Route::get('/history/{id_transaksi}', [HistoryController::class, 'show'])->name('user-show-history');
        Route::get('/edit-account', [UserUserController::class, 'edit'])->name('user-edit-account');
        Route::post('/edit-account', [UserUserController::class, 'update'])->name('user-update-account');
    });
});
