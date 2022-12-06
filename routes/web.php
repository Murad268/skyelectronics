<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AdminOrdersList;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\admin\ContactsController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\FirmsController;
use App\Http\Controllers\admin\PhonesController;
use App\Http\Controllers\admin\SiteParametersController;
use App\Http\Controllers\admin\GoodController;
use App\Http\Controllers\admin\PotoController;
use App\Http\Controllers\admin\TagsController;
use App\Http\Controllers\admin\UsersListController;
use App\Http\Controllers\auth\EnterController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\front\AboutController;
use App\Http\Controllers\front\BackController;
use App\Http\Controllers\front\BestPrice;
use App\Http\Controllers\front\ComplaintsController;
use App\Http\Controllers\front\ConfController;
use App\Http\Controllers\front\ContactUsController;
use App\Http\Controllers\front\CorporativesController;
use App\Http\Controllers\front\DeliveryController;
use App\Http\Controllers\front\GoodsMenuController;
use App\Http\Controllers\front\MainMenuController;
use App\Http\Controllers\front\MonthlyController;
use App\Http\Controllers\front\PieceController;
use App\Http\Controllers\front\StoreController;
use App\Http\Controllers\front\TermsController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\user\addOrderController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\CommentsController;
use App\Http\Controllers\user\FavoritesController;
use App\Http\Controllers\user\orderController;
use App\Http\Controllers\user\OrdersListController;
use App\Http\Controllers\user\UserOrderListController;
use App\Http\Controllers\user\UserProfileController;
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
    Route::get('/delete', [PhonesController::class, 'delete'])->name('phonesparameterdelete');
    Route::get('/login', [AdminLoginController::class, 'index'])->name('loginshow');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('login');
    Route::get('/exit', [AdminLoginController::class, 'exit'])->name('exit');
    Route::get('/orderslist', [AdminOrdersList::class, 'orderslist'])->name('orderslist');
    Route::post('/orderssearch', [AdminOrdersList::class, 'orderslist'])->name('orderssearch');
    Route::group(['prefix' => 'users', 'as' => 'users.'], function() {
        Route::get('/', [UsersListController::class, 'index'])->name('index');
        Route::get('/axtaris', [UsersListController::class, 'index'])->name('search');
        Route::get('/addadmin/{id}', [UsersListController::class, 'addadmin'])->name('addadmin');
        Route::get('/block/{id}', [UsersListController::class, 'block'])->name('block');
        Route::get('/removeblock/{id}', [UsersListController::class, 'removeblock'])->name('removeblock');
    });

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
        Route::get('/delete/{id}', [GoodController::class, 'delete'])->name('delete');
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

    Route::group(['prefix' => 'colors', 'as' => 'colors.'], function() {
        Route::get('/', [ColorController::class, 'index'])->name('index');
        Route::post('/store', [ColorController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [ColorController::class, 'delete'])->name('delete');
    });
});





    Route::get('/', [MainMenuController::class, 'index'])->name('front.index');

    Route::get('/məhsul/{slug}/{color}', [GoodsMenuController::class, 'index'])->name('goodsab');
    Route::get('/aylıq-odenishlerin-heyata-kechmesi', [MonthlyController::class, 'index'])->name('front.monthly');
    Route::get('geri-qaytarma-siyaseti', [BackController::class, 'index'])->name('front.back');
    Route::get('en-yaxshi-qiymete-zemanet-siyaseti', [BestPrice::class, 'index'])->name('front.bestprice');
    Route::get('shikayetlerin-idareolunma-siyaseti', [ComplaintsController::class, 'index'])->name('front.complaints');
    Route::get('konfidensialliq-siyaseti', [ConfController::class, 'index'])->name('front.conf');
    Route::get('elaqe', [ContactUsController::class, 'index'])->name('front.contact');
    Route::get('korporativ-shatıshlar', [CorporativesController::class, 'index'])->name('front.corporative');
    Route::get('chatdirilma', [DeliveryController::class, 'index'])->name('front.delivery');
    Route::get('hisse-hisse-odenish-shertleri', [PieceController::class, 'index'])->name('front.piece');
    Route::get('saytin-istifade-shertleri', [TermsController::class, 'index'])->name('front.terms');
    Route::get('magaza/{slug?}', [StoreController::class, 'index'])->name('front.store');
    Route::get('tags/{slug?}', [StoreController::class, 'index'])->name('front.tagstore');
    Route::get('magaza', [StoreController::class, 'index'])->name('front.seacrh');



    Route::group(['namespace' => 'Auth', 'prefix' => 'auth', 'as' => 'auth.'], function() {
        Route::get('/', [RegisterController::class, 'index'])->name('register');
        Route::post('/create', [RegisterController::class, 'create'])->name('create');
        Route::get('/enter', [EnterController::class, 'index'])->name('enter');
        Route::post('/login', [EnterController::class, 'login'])->name('login');
        Route::get('/exit', [EnterController::class, 'exit'])->name('exit');
    });


    Route::group(['namespace' => 'User', 'prefix' => 'user', 'as' => 'user.'], function() {
        Route::get('səbət', [CartController::class, 'index'])->name('cart');
        Route::get('/addcart/{id}', [CartController::class, 'addcart'])->name('addcart');
        Route::get('/delete/{id}', [CartController::class, 'delete'])->name('delete');
        Route::post('/addcomment', [CommentsController::class, 'addcomment'])->name('addcomment');
        Route::get('/addcount/{id}', [CartController::class, 'addcount'])->name('addcount');
        Route::get('/mincount/{id}', [CartController::class, 'mincount'])->name('mincount');
        Route::get('/addfav/{id}', [FavoritesController::class, 'addfav'])->name('addfav');
        Route::get('/favorilərim', [FavoritesController::class, 'index'])->name('favorites');
        Route::get('/delfav/{id}', [FavoritesController::class, 'delfav'])->name('delfav');
        Route::get('/profile', [UserProfileController::class, 'index'])->name('index');
        Route::post('/updatemain', [UserProfileController::class, 'updatemain'])->name('updatemain');
        Route::post('/updatelink', [UserProfileController::class, 'updatelink'])->name('updatelink');
        Route::post('/updateavatar', [UserProfileController::class, 'updateavatar'])->name('updateavatar');
        Route::get('/order', [orderController::class, 'index'])->name('order');
        Route::post('/order', [orderController::class, 'index'])->name('ordered');
        Route::get('/orderfinish/{id}', [AdminOrdersList::class, 'orderfinish'])->name('orderfinish');
        Route::get('/cancelorder/{id}', [UserOrderListController::class, 'cancelorder'])->name('cancelorder');
        Route::get('/deleteorder/{id}', [UserOrderListController::class, 'deleteorder'])->name('deleteorder');
    });


    Route::post('/mail', [MailController::class, 'send'])->name('sendmail');
    Route::post('/ordering', [addOrderController::class, 'add'])->name('addorder');

    Route::get('/sifarislerim', [UserOrderListController::class, 'index'])->name('orderlisting');
    Route::get('/haqqımızda', [AboutController::class, 'index'])->name('about');
