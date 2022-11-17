<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\SiteParametersController;
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

Route::get('/', [AdminController::class, 'index'])->name('admin.index');
Route::get('/umumiparametrler', [SiteParametersController::class, 'index'])->name('siteParameters');
Route::post('/edit', [SiteParametersController::class, 'update'])->name('siteparametersedit');
