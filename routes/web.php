<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('/home', [TodoController::class, 'index']);
Route::post('/create', [TodoController::class, 'store'])->name('todo_store');
Route::post('/update', [TodoController::class, 'update'])->name('todo_update');
Route::post('/delete', [TodoController::class, 'destroy'])->name('todo_delete');











Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
