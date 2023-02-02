<?php

use App\Http\Controllers\ActivationController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\KanbanController;
use App\Http\Controllers\MpayController;
use App\Http\Controllers\ProfileController;
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

    Route::GET('/aktivasi', [ActivationController::class, 'index'])->name('aktivasi');
    // Route::GET('/aktivasi-data', [ActivationController::class, 'viewData'])->name('viewData');
    Route::POST('/aktivasi/store', [BannerController::class, 'store'])->name('aktivasi.store');
    Route::GET('/aktivasi/edit/{id?}', [BannerController::class, 'edit'])->name('aktivasi.edit');
    Route::POST('/aktivasi/update/{id?}', [BannerController::class, 'update'])->name('aktivasi.update');
    Route::DELETE('/aktivasi/delete/{id?}', [BannerController::class, 'destroy'])->name('aktivasi.destroy');

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
});

require __DIR__ . '/auth.php';
