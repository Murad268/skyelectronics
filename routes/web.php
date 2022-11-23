<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ContactsController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\FirmsController;
use App\Http\Controllers\admin\PhonesController;
use App\Http\Controllers\admin\SiteParametersController;
use App\Http\Controllers\admin\GoodController;
use App\Http\Controllers\admin\PotoController;
use App\Http\Controllers\admin\TagsController;
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
    Route::post('/create', [PhonesController::class, 'create'])->name('phonesparametersadd');
    Route::get('/delete', [PhonesController::class, 'delete'])->name('phonesparameterdelete');

    Route::group(['prefix' => 'faq', 'as' => 'faq.'], function() {
        Route::get('/', [FaqController::class, 'index'])->name('index');
        Route::get('/delete/{id}', [FaqController::class, 'delete'])->name('delete');
        Route::post('/store', [FaqController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [FaqController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [FaqController::class, 'update'])->name('update');
    });
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function() {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('/', [CategoryController::class, 'index'])->name('search');
        Route::post('/create', [CategoryController::class, 'create'])->name('create');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
    });
    Route::group(['prefix' => 'firms', 'as' => 'firms.'], function() {
        Route::get('/', [FirmsController::class, 'index'])->name('index');
        Route::post('/store', [FirmsController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [FirmsController::class, 'delete'])->name('delete');
        Route::get('/edit/{id}', [FirmsController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [FirmsController::class, 'update'])->name('update');
        Route::post('/', [FirmsController::class, 'index'])->name('search');
    });
    Route::group(['prefix' => 'goods', 'as' => 'goods.'], function() {
        Route::get('/', [GoodController::class, 'index'])->name('index');
        Route::post('/store', [GoodController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [GoodController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [GoodController::class, 'update'])->name('update');
        Route::post('/', [GoodController::class, 'index'])->name('search');
    });

    Route::group(['prefix' => 'tags', 'as' => 'tags.'], function() {
        Route::get('/', [TagsController::class, 'index'])->name('index');
        Route::post('/store', [TagsController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [TagsController::class, 'delete'])->name('delete');
        Route::post('/', [TagsController::class, 'index'])->name('search');
    });

    Route::group(['prefix' => 'photos', 'as' => 'photos.'], function() {
        Route::get('/', [PotoController::class, 'index'])->name('index');
        Route::post('/create', [PotoController::class, 'create'])->name('create');
        Route::get('/delete/{id}', [PotoController::class, 'delete'])->name('delete');
        Route::get('/update/{id}', [PotoController::class, 'update'])->name('update');
    });
});




