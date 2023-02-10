<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\ActivationController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\KanbanController;
use App\Http\Controllers\MpayController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackingController;
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

Route::middleware('auth')->group(function () {
    Route::GET('/lalala', [Controller::class, 'stisla'])->name('s');

    Route::GET('/dashboard', [Controller::class, 'index'])->name('dashboard');
    // Route::GET('/kanban-board', [KanbanController::class, 'index'])->name('kanban');

    /** Aktivasi */
    Route::GET('/aktivasi', [ActivationController::class, 'index'])->name('aktivasi');
    Route::GET('/aktivasi/add', [ActivationController::class, 'add'])->name('aktivasi.add');
    Route::POST('/aktivasi/store', [ActivationController::class, 'store'])->name('aktivasi.store');
    Route::POST('/aktivasi/storeStatus/{id?}', [ActivationController::class, 'storeStatus'])->name('aktivasi.storeStatus');
    Route::GET('/aktivasi/edit/{id?}', [ActivationController::class, 'edit'])->name('aktivasi.edit');
    Route::POST('/aktivasi/update/{id?}', [ActivationController::class, 'update'])->name('aktivasi.update');
    Route::DELETE('/aktivasi/delete/{id?}', [ActivationController::class, 'destroy'])->name('aktivasi.destroy');

    /** Pegawai */
    Route::GET('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::POST('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::GET('/pegawai/edit/{id?}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::POST('/pegawai/update/{id?}', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::DELETE('/pegawai/delete/{id?}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

    /** Absen */
    Route::any('/getDataPegawai', [AbsenController::class, 'getDataPegawai'])->name('getDataPegawai'); //post
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

    /** Tracking */
    Route::GET('/tracking', [TrackingController::class, 'index'])->name('tracking');
    Route::POST('/tracking/store', [TrackingController::class, 'store'])->name('tracking.store');
    Route::GET('/tracking/edit/{id?}', [TrackingController::class, 'edit'])->name('tracking.edit');
    Route::POST('/tracking/update/{id?}', [TrackingController::class, 'update'])->name('tracking.update');
    Route::DELETE('/tracking/delete/{id?}', [TrackingController::class, 'destroy'])->name('tracking.destroy');
});

require __DIR__ . '/auth.php';
