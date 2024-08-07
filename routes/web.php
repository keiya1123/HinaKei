<?php

use App\Http\Controllers\CommentController;
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

//一つにまとめられるかも？　あとで実装の確認！
// Route::resource('works', WorkController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/works/create', function () {return view('works.create');});
Route::get('/works/create' , [WorkController::class, 'create'])->name('works.create');

Route::post('/works' , [WorkController::class, 'store'])->name('works.store');

Route::get('/works/{id}' , [WorkController::class, 'show'])->name('works.show');

Route::get('/works/{id}/edit' , [WorkController::class, 'edit'])->name('works.edit');

Route::put('/works/{id}' , [WorkController::class, 'update'])->name('works.update');

// Route::delete('/works/{id}' , [WorkController::class, 'destroy'])->name('works.destroy');
Route::delete('/works/{work}' , [WorkController::class, 'destroy'])->name('works.destroy');

Route::get('/works' , [WorkController::class, 'index'])->name('works.index');

//コメント機能
Route::get('/comments/create/{work_id}' , [CommentController::class, 'create'])->name('comments.create');

Route::post('/comments' , [CommentController::class, 'store'])->name('comments.store');

Route::delete('/comments/{comment}' , [CommentController::class, 'destroy'])->name('comments.destroy');

//マイページに遷移
Route::get('/works/mypage' , [WorkController::class, 'mypage'])->name('works.mypage');
