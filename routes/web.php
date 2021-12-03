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
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'startPage'])->name('startPage');
Route::post('/sakme-new', [HomeController::class, 'sakmeNew'])->name('sakmeNew');
Route::post('/file-new', [HomeController::class, 'fileNew'])->name('fileNew');

Route::get('/delete/{element}/{elementID}', [HomeController::class, 'delete'])->name('delete');
