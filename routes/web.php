<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\ActivationController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\KanbanController;
// use App\Http\Controllers\TrackingController;
use App\Http\Controllers\MpayController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackingController;
use Illuminate\Support\Facades\Route;

use Alexpechkarev\GoogleMaps\GoogleMaps;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\TugasPegawaiController;
use App\Http\Controllers\UserSumaController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// , 'admin'
Route::get('/view-captcha', [RecaptchaController::class, 'index'])->name('view_captcha');
Route::get('/get-captcha', [RecaptchaController::class, 'get_recaptcha'])->name('get_captcha');
Route::post('/cek-captcha', [RecaptchaController::class, 'cek_recaptcha'])->name('cek_captcha');

Route::middleware('auth')->group(function () {
    Route::GET('/dashboard', [Controller::class, 'index'])->name('dashboard');

    /** Absen */
    Route::GET('/absensi', [AbsenController::class, 'index'])->name('absensi');
    Route::GET('/absensi/add', [AbsenController::class, 'add'])->name('absensi.add');
    Route::POST('/absensi/store', [AbsenController::class, 'store'])->name('absensi.store');
    Route::GET('/absensi/edit/{id?}', [AbsenController::class, 'edit'])->name('absensi.edit');
    Route::POST('/absensi/update/{id?}', [AbsenController::class, 'update'])->name('absensi.update');
    Route::DELETE('/absensi/delete/{id?}', [AbsenController::class, 'destroy'])->name('absensi.destroy');

    /** M-Pay */
    Route::GET('/mpay/rekening', [MpayController::class, 'indexRekening'])->name('rekening');
    Route::GET('/mpay/mutasi', [MpayController::class, 'indexMutasi'])->name('mutasi');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /** Kanban Board */
    // Route::resources('kanban', KanbanController::class);
    Route::GET('/kanban-board', [KanbanController::class, 'index'])->name('kanban');
    Route::GET('/get-kanban', [KanbanController::class, 'indexKanban'])->name('kanbanIndex');
    Route::POST('/kanban-board/store', [KanbanController::class, 'store'])->name('kanban.store');
    Route::POST('/kanban-board/show', [KanbanController::class, 'show'])->name('kanban.show');
    Route::POST('/kanban-board/update{id?}', [KanbanController::class, 'update'])->name('kanban.update');
    Route::POST('/kanban-board/cancel{id?}', [KanbanController::class, 'cancel'])->name('kanban.cancel');
    Route::POST('/kanban-board/dragstatus{id?}', [KanbanController::class, 'dragstatus'])->name('kanban.dragstatus');
    // Route::POST('/kanban-board/movecard{id?}', [KanbanController::class, 'movecard'])->name('kanban.movecard');

    Route::middleware('auth', 'role')->group(function () {
        /** Banner */
        Route::GET('/banner', [BannerController::class, 'index'])->name('banner');
        Route::POST('/banner/store', [BannerController::class, 'store'])->name('banner.store');
        Route::GET('/banner/edit/{id?}', [BannerController::class, 'edit'])->name('banner.edit');
        Route::POST('/banner/update/{id?}', [BannerController::class, 'update'])->name('banner.update');
        Route::DELETE('/banner/delete/{id?}', [BannerController::class, 'destroy'])->name('banner.destroy');

        /** Pegawai */
        Route::GET('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
        Route::POST('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
        Route::GET('/pegawai/edit/{id?}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
        Route::POST('/pegawai/update/{id?}', [PegawaiController::class, 'update'])->name('pegawai.update');
        Route::DELETE('/pegawai/delete/{id?}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

        Route::any('/getDataPegawai', [PegawaiController::class, 'getDataPegawai'])->name('getDataPegawai'); //post
        Route::any('/getDataPegawai2', [PegawaiController::class, 'getDataPegawai2'])->name('getDataPegawai2'); //post

        /** Aktivasi */
        Route::GET('/aktivasi', [ActivationController::class, 'index'])->name('aktivasi');
        Route::GET('/aktivasi/add', [ActivationController::class, 'add'])->name('aktivasi.add');
        Route::POST('/aktivasi/store', [ActivationController::class, 'store'])->name('aktivasi.store');
        Route::POST('/aktivasi/storeStatus/{id?}', [ActivationController::class, 'storeStatus'])->name('aktivasi.storeStatus');
        Route::GET('/aktivasi/edit/{id?}', [ActivationController::class, 'edit'])->name('aktivasi.edit');
        Route::POST('/aktivasi/update/{id?}', [ActivationController::class, 'update'])->name('aktivasi.update');
        Route::DELETE('/aktivasi/delete/{id?}', [ActivationController::class, 'destroy'])->name('aktivasi.destroy');

        /** User Maslahah */
        Route::GET('/user-suma', [UserSumaController::class, 'index'])->name('user.suma');
        Route::POST('/userSuma/store', [UserSumaController::class, 'store'])->name('userSuma.store');
        Route::GET('/userSuma/edit/{id?}', [UserSumaController::class, 'edit'])->name('userSuma.edit');
        Route::POST('/userSuma/update/{id?}', [UserSumaController::class, 'update'])->name('userSuma.update');
        Route::DELETE('/userSuma/delete/{id?}', [UserSumaController::class, 'destroy'])->name('userSuma.destroy');

        /** Tugas Pegawai */
        Route::GET('/tugas-pegawai', [TugasPegawaiController::class, 'index'])->name('tugasPegawai.list');
        Route::GET('/tugas-pegawai/add', [TugasPegawaiController::class, 'add'])->name('tugasPegawai.add');
        Route::POST('/tugasPegawai/store', [TugasPegawaiController::class, 'store'])->name('tugasPegawai.store');
        Route::GET('/tugasPegawai/edit/{id?}', [TugasPegawaiController::class, 'edit'])->name('tugasPegawai.edit');
        Route::POST('/tugasPegawai/update/{id?}', [TugasPegawaiController::class, 'update'])->name('tugasPegawai.update');
        Route::DELETE('/tugasPegawai/delete/{id?}', [TugasPegawaiController::class, 'destroy'])->name('tugasPegawai.destroy');

        /** Tracking */
        Route::GET('/tracking', [TrackingController::class, 'index'])->name('tracking');
        Route::POST('/tracking/store', [TrackingController::class, 'store'])->name('tracking.store');
        Route::GET('/tracking/edit/{id?}', [TrackingController::class, 'edit'])->name('tracking.edit');
        Route::POST('/tracking/update/{id?}', [TrackingController::class, 'update'])->name('tracking.update');
        Route::DELETE('/tracking/delete/{id?}', [TrackingController::class, 'destroy'])->name('tracking.destroy');

        /** crud */
        Route::GET('/lokasi', [TrackingController::class, 'indexLokasi'])->name('indexLokasi');
        Route::GET('/data', [TrackingController::class, 'viewData'])->name('viewData');
        Route::GET('/viewMap', [TrackingController::class, 'viewMap'])->name('viewMap');
        Route::POST('/add', [TrackingController::class, 'store'])->name('add');
        Route::get('/google-autocomplete', [GoogleController::class, 'index']);
    });
});

require __DIR__ . '/auth.php';
