<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

// this route is not part of vendor
Route::post('/create/todo', [\App\Http\Controllers\TodoController::class, 'create'])->middleware(['auth'])->name('create.todo');
Route::post('/update/todo/{id}', [\App\Http\Controllers\TodoController::class, 'update'])->middleware(['auth'])->name('update.todo');
Route::get('/delete/todo/{id}', [\App\Http\Controllers\TodoController::class, 'delete'])->middleware(['auth'])->name('delete.todo');
