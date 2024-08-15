<?php

use App\Http\Controllers\TodoListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/todo', [TodoListController::class, 'index'])->name('todo.index');
Route::get('/todo/{todo}', [TodoListController::class, 'show'])->name('todo.show');
Route::post('/todo', [TodoListController::class, 'create'])->name('todo.create');
Route::put('/todo/{todo}', [TodoListController::class, 'update'])->name('todo.update');
Route::delete('/todo/{todo}', [TodoListController::class, 'delete'])->name('todo.delete');