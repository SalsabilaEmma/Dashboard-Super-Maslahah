<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\KanbanController;
use App\Http\Controllers\MpayController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::GET('/', [Controller::class, 'index'])->name('dashboard');
Route::GET('/kanban-board', [KanbanController::class, 'index'])->name('kanban');

/** M-Pay */
Route::GET('/mpay/rekening', [MpayController::class, 'indexRekening'])->name('rekening');
Route::GET('/mpay/mutasi', [MpayController::class, 'indexMutasi'])->name('mutasi');
