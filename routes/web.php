<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ContactsController;
use App\Http\Controllers\admin\PhonesController;
use App\Http\Controllers\admin\SiteParametersController;
use Illuminate\Support\Facades\Route;





Route::group(['namespace' => 'Nedmin', 'prefix' => 'nedmin', 'as' => 'admin.'], function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/umumiparametrler', [SiteParametersController::class, 'index'])->name('siteparameters');
    Route::post('/editSiteParameters', [SiteParametersController::class, 'update'])->name('siteparametersedit');
    Route::get('/telefonlar', [PhonesController::class, 'index'])->name('phonesparameters');
    Route::get('/edit/{id?}', [PhonesController::class, 'edit'])->name('phonesparametersedit');
    Route::post('/update/{id?}', [PhonesController::class, 'update'])->name('phonesparametersupdate');
    Route::get('/əlaqələr', [ContactsController::class, 'index'])->name('contactsparameters');
    Route::post('/edit', [ContactsController::class, 'edit'])->name('contactsparametersedit');
});




