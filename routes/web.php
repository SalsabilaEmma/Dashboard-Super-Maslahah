<?php

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

// Route::get('/dashboard', function () {
//     // return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::GET('/lalala', [Controller::class, 'stisla'])->name('s');

    Route::GET('/dashboard', [Controller::class, 'index'])->name('dashboard');
    // Route::GET('/kanban-board', [KanbanController::class, 'index'])->name('kanban');

    /** M-Pay */
    Route::GET('/mpay/rekening', [MpayController::class, 'indexRekening'])->name('rekening');
    Route::GET('/mpay/mutasi', [MpayController::class, 'indexMutasi'])->name('mutasi');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /** Kanban Board */
    // Route::resources('kanban', KanbanController::class);
    Route::GET('/kanban-board', [KanbanController::class, 'index'])->name('kanban');
    Route::GET('/getId-kanban', [KanbanController::class, 'indexKanban'])->name('kanbanIndex');
    Route::POST('/kanban-board/store', [KanbanController::class, 'store'])->name('kanban.store');
});

require __DIR__ . '/auth.php';
