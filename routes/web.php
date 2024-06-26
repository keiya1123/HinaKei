<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/works/create', function () {return view('works.create');});

Route::post('/works/store' , [WorkController::class, 'store'])->name('works.store');

Route::get('/works/{id}' , [WorkController::class, 'show'])->name('works.show');

Route::get('/works/{id}/edit' , [WorkController::class, 'edit'])->name('works.edit');

Route::put('/works/{id}' , [WorkController::class, 'update'])->name('works.update');

Route::delete('/works/{id}' , [WorkController::class, 'destroy'])->name('works.destroy');

Route::get('/works' , [WorkController::class, 'index'])->name('works.index');
