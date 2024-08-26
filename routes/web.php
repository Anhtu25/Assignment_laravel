<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ExcelController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\AuthenController as AuthenController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Client\HomeController as ClientHomeController;
use App\Http\Controllers\Admin\AuthorController as AdminAuthorController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Client\ProductController as ClientProductController;

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

    // Nhom Excel
    route::group(['prefix'=>'excels', 'as'=>'excels.'],function(){
        Route::get('viewExport',[ExcelController::class, 'viewExport'])->name('viewExport');
        Route::get('exportFile',[ExcelController::class, 'exportFile'])->name('exportFile');
        Route::get('importExcelFile',[ExcelController::class, 'importExcelFile'])->name('importExcelFile');
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
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/list-category', [CategoryController::class, 'listCategories'])->name('listCategories');
        Route::get('/add-category', [CategoryController::class, 'addCategories'])->name('addCategories');
        Route::post('/add-category', [CategoryController::class, 'storeCategories'])->name('storeCategories');
        Route::get('/detail-category/{idCategory}', [CategoryController::class, 'detailCategories'])->name('detailCategories');
        Route::get('/edit-category/{idCategory}', [CategoryController::class, 'editCategories'])->name('editCategories');
        Route::patch('/update-category/{idCategory}', [CategoryController::class, 'updateCategories'])->name('updateCategories');
        Route::delete('/del-category', [CategoryController::class, 'deleteCategories'])->name('deleteCategories');
    });
    Route::group(['prefix' => 'authors', 'as' => 'authors.'], function () {
        Route::get('/list-author', [AdminAuthorController::class, 'listAuthors'])->name('listAuthors');
        Route::get('/add-author', [AdminAuthorController::class, 'addAuthors'])->name('addAuthors');
        Route::post('/add-author', [AdminAuthorController::class, 'storeAuthors'])->name('storeAuthors');
        Route::get('/edit-author/{idAuthor}', [AdminAuthorController::class, 'editAuthors'])->name('editAuthors');
        Route::patch('/update-author/{idAuthor}', [AdminAuthorController::class, 'updateAuthors'])->name('updateAuthors');
        Route::delete('/delete-author', [AdminAuthorController::class, 'deleteAuthors'])->name('deleteAuthors');
    });
    Route::group(['prefix' => 'publishers', 'as' => 'publishers.'], function () {
        Route::get('/list-publisher', [PublisherController::class, 'listPublishers'])->name('listPublishers');
        Route::get('/add-publisher', [PublisherController::class, 'addPublishers'])->name('addPublishers');
        Route::post('/add-publisher', [PublisherController::class, 'storePublishers'])->name('storePublishers');
        Route::get('/edit-publishers/{idPublisher}', [PublisherController::class, 'editPublishers'])->name('editPublishers');
        Route::patch('/update-publishers/{idPublisher}', [PublisherController::class, 'updatePublishers'])->name('updatePublishers');
        Route::delete('/delete-publisher', [PublisherController::class, 'deletePublishers'])->name('deletePublishers');
    });
    Route::get('/home-admin', [AdminHomeController::class, 'homeAdmin'])->name('homeAdmin');
    Route::get('/analytic-admin', [AdminController::class, 'adminAnalytic'])->name('adminAnalytic');
    Route::get('/search', [AdminProductController::class, 'search'])->name('search');

});

Route::group(['prefix' => 'clients', 'as' => 'clients.'], function () {
    Route::get('/home', [ClientHomeController::class, 'index'])->name('index');
    Route::get('/contact', [ClientHomeController::class, 'contact'])->name('contact');
    Route::get('/shop-products', [ClientProductController::class, 'shopProducts'])->name('shopProducts');
    Route::get('/product-details/{idProduct}', [ClientHomeController::class, 'productDetails'])->name('productDetails');
    // Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    // Route::get('/check-out', [CartController::class, 'checkOut'])->name('checkOut');
    Route::get('/search', [ClientProductController::class, 'search'])->name('search');
    Route::get('/categories/{idCategories}', [ClientHomeController::class, 'filterByCategory'])->name('filterByCategory');

    Route::group([
        'middleware' => 'checkUser'
    ], function () {
        Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');
        Route::get('view-cart', [CartController::class, 'cart'])->name('cart');
        Route::patch('update-cart', [CartController::class, 'updateCart'])->name('updateCart');
        Route::delete('delete-cart', [CartController::class, 'deleteCart'])->name('deleteCart');
    });
    // Route::get('/cart-quantity', [UserController::class, 'cartQuantity'])->name('cartQuantity');
});
Route::group([
    'prefix' => 'order',
    'as'=>'order.',
    'middleware' => 'checkUser'
], function () {
    Route::get('view-checkout', [CheckOutController::class, 'checkout'])->name('checkout');
    Route::post('post-checkout', [CheckOutController::class, 'postCheckout'])->name('postCheckout');

    // Route::patch('update-cart', [CheckOutController::class, 'updateCart'])->name('updateCart');
    // Route::delete('delete-cart', [CheckOutController::class, 'deleteCart'])->name('deleteCart');
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

Route::get('test', [UserController::class, 'test'])->name('test');
Route::post('post-test', [UserController::class, 'postTest'])->name('postTest');
