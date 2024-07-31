<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenController;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Client\HomeController as ClientHomeController;

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

Route::group(['prefix' => 'admins', 'as' => 'admins.', 'middleware' => 'checkAdmin'], function () {
    Route::group(['prefix' => 'profiles', 'as' => 'profiles.'], function () {
        Route::get('/profile-page', [ProfileController::class, 'profilePageAdmin'])->name('profilePageAdmin');
        Route::get('/profile-setting', [ProfileController::class, 'profileSettingAdmin'])->name('profileSettingAdmin');
    });
    // Nhom quan ly user
    route::group(['prefix' => 'users', 'as' => 'users.',], function () {
        Route::get('/user-manager', [UserController::class, 'userManager'])->name('userManager');
        Route::post('add-user', [UserController::class, 'addUsers'])->name('addUsers');
        Route::delete('delete-user', [UserController::class, 'delUser'])->name('delUser');
        Route::get('detail-user', [UserController::class, 'detailUser'])->name('detailUser');
        Route::post('update-user', [UserController::class, 'updateUser'])->name('updateUser');
    });
    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/list-product', [AdminProductController::class, 'listProducts'])->name('listProducts');
        Route::get('/add-product', [AdminProductController::class, 'addProducts'])->name('addProducts');
        Route::post('/add-product', [AdminProductController::class, 'postProducts'])->name('postProducts');
        Route::get('/detail-product/{idProduct}', [AdminProductController::class, 'detailProducts'])->name('detailProducts');
        Route::get('/edit-product/{idProduct}', [AdminProductController::class, 'editProducts'])->name('editProducts');
        Route::patch('/update-product/{idProduct}', [AdminProductController::class, 'updateProducts'])->name('updateProducts');
        Route::delete('/delete-product', [AdminProductController::class, 'deleteProduct'])->name('deleteProduct');
    });
    Route::get('/home-admin', [AdminHomeController::class, 'homeAdmin'])->name('homeAdmin');
    Route::get('/analytic-admin', [AdminController::class, 'adminAnalytic'])->name('adminAnalytic');
});

Route::group(['prefix' => 'clients', 'as' => 'clients.'], function () {
    Route::get('/home', [ClientHomeController::class, 'index'])->name('index');
    Route::get('/contact', [ClientHomeController::class, 'contact'])->name('contact');
    Route::get('/shop-products', [ClientProductController::class, 'shopProducts'])->name('shopProducts');
    Route::get('/product-details', [ClientProductController::class, 'productDetails'])->name('productDetails');
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::get('/check-out', [CartController::class, 'checkOut'])->name('checkOut');
});


Route::group(['prefix' => 'authors', 'as' => 'authors.'], function () {
    Route::get('/login', [AuthenController::class, 'login'])->name('login');
    Route::post('/login', [AuthenController::class, 'postLogin'])->name('postLogin');

    Route::get('/register', [AuthenController::class, 'register'])->name('register');
    Route::post('/register', [AuthenController::class, 'postRegister'])->name('postRegister');

    Route::get('/logout', [AuthenController::class, 'logout'])->name('logout');

    Route::get('/forgotpassword', [AuthenController::class, 'forgotpassword'])->name('forgotpassword');
    Route::post('/forgotpassword', [AuthenController::class, 'authSendEmail'])->name('authSendEmail');


    Route::get('/PasswordChange', [AuthenController::class, 'PasswordChange'])->name('PasswordChange');
    Route::get('/notificationDone', [AuthenController::class, 'notificationDone'])->name('notificationDone');
});
