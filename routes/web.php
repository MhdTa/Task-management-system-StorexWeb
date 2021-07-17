<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;
use App\Http\Controllers\CheckListController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

// Route::get('/', function () {
//     return view('home');
// })->name('home');




//log out Route
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
//log in Route
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
//sign in Route
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
//checkList Route
Route::get('/', [CheckListController::class, 'home'])->name('home');
Route::get('/checkList', [CheckListController::class, 'index'])->name('checkList');
Route::post('/checkList', [CheckListController::class, 'store'])->name('checkList.add');
Route::get('/checkList/{id}', [CheckListController::class, 'done'])->name('checkList.done');
Route::get('/checkList/edit/{id}', [CheckListController::class, 'editView'])->name('checkList.edit');
Route::post('/checkList/edit/{id}', [CheckListController::class, 'edit'])->name('checkList.edit');
Route::delete('/checkList/delete/{id}', [CheckListController::class, 'destroy'])->name('checkList.destroy');

//tasks Route
Route::post('/task/{checkListId}', [TaskController::class, 'store'])->name('task.add');
Route::get('/task/{id}', [TaskController::class, 'done'])->name('task.done');
Route::get('/task/edit/{id}', [TaskController::class, 'editView'])->name('task.edit');
Route::post('/task/edit/{id}', [TaskController::class, 'edit'])->name('task.edit');
Route::delete('/task/delete/{id}', [TaskController::class, 'destroy'])->name('task.destroy');

