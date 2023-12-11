<?php

use Illuminate\Support\Facades\Route;

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

// Admin Panel
Route::namespace('Admin')->prefix('food/admin/')->name('food.admin.')->group(function () {
    Route::get('login', 'AdminController@loginPage')->name('loginPage');
    Route::post('login', 'AdminController@login')->name('login');
    Route::post('logout', 'AdminController@logout')->name('logout');

    Route::middleware('adminAuth')->group(function () {
        // Dashboard
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        // Order
        Route::prefix('order/')->name('order.')->group(function () {
            Route::get('list', 'OrderController@list')->name('list');
            Route::get('edit/{orderId}', 'OrderController@edit')->name('edit');
            Route::put('update/{orderId}', 'OrderController@update')->name('update');
            Route::delete('delete/{orderId}', 'OrderController@delete')->name('delete');
            Route::get('export', 'OrderController@export')->name('export');
            Route::post('import', 'OrderController@import')->name('import');
            Route::get('send/email/{orderId}', 'OrderController@sendEmail')->name('sendEmail');
        });

        // User
        Route::prefix('user/')->name('user.')->group(function () {
            Route::get('list', 'UserController@index')->name('list');
            Route::get('create', 'UserController@create')->name('create');
            Route::post('store', 'UserController@store')->name('store');
            Route::delete('delete/{userId}', 'UserController@destroy')->name('delete');
            Route::get('contact_list', 'ContactController@contactList')->name('contactListPage');
            Route::delete('contact_list_delete/{contactId}', 'ContactController@contactDestroy')->name('contactListDelete');
        });

        // Category
        Route::prefix('category/')->name('category.')->group(function () {
            Route::get('list', 'CategoryController@list')->name('list');
            Route::get('create', 'CategoryController@create')->name('create');
            Route::post('store', 'CategoryController@store')->name('store');
            Route::get('edit/{categoryId}', 'CategoryController@edit')->name('edit');
            Route::post('update/{categoryId}', 'CategoryController@update')->name('update');
            Route::delete('delete/{categoryId}', 'CategoryController@delete')->name('delete');
        });

        // Product
        Route::prefix('product/')->name('product.')->group(function () {
            Route::get('list', 'ProductController@list')->name('list');
            Route::get('create', 'ProductController@create')->name('create');
            Route::post('store', 'ProductController@store')->name('store');
            Route::get('edit/{productId}', 'ProductController@edit')->name('edit');
            Route::post('update/{productId}', 'ProductController@update')->name('update');
            Route::delete('delete/{productId}', 'ProductController@delete')->name('delete');
        });
    });
});

// User Website
Route::namespace('User')->prefix('/')->group(function () {
    Route::get('/', 'HomeController@index')->name('index');

    //Cart
    Route::prefix('cart/')->name('cart.')->group(function () {
        Route::get('list', 'CartController@list')->name('list');
        Route::delete('delete/{cartId}', 'CartController@delete')->name('delete');
        Route::get('order/list/', 'CartController@orderList')->name('orderList');
        Route::get('list/clear', 'CartController@cartListClear')->name('cartListClear');
    });

    Route::get('user/filter/{id}', 'HomeController@filter')->name('category#filter');
    Route::get('show-all-products', 'HomeController@showAll')->name('product#all');
    Route::get('search', 'HomeController@search')->name('search');


    // Authentication
    Route::get('register', 'AuthController@registerPage')->name('registerPage');
    Route::post('register', 'AuthController@register')->name('register');
    Route::get('login', 'AuthController@loginPage')->name('loginPage');
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('logout', 'AuthController@logout')->name('logout');

    Route::middleware('userAuth')->group(function () {
        // Profile Update
        Route::get('profile', 'ProfileController@profilePage')->name('profilePage');
        Route::put('profile/{userId}', 'ProfileController@profileUpdate')->name('profile');

        // Change Password
        Route::get('profile/change_password', 'ProfileController@changePasswordPage')->name('changePasswordPage');
        Route::post('profile/change_password', 'ProfileController@changePassword')->name('changePassword');

        // Contact Page
        Route::get('contactus', 'ContactController@contactCreate')->name('contactus');
        Route::post('contactus', 'ContactController@contactStore')->name('contactusPage');

        // Order
        Route::get('order-history', 'OrderController@orderHistory')->name('orderHistoryPage');
        Route::post('order-status/{orderId}', 'OrderController@orderStatus')->name('orderStatus');

        // Add to Cart
        Route::post('add-to-cart', 'HomeController@addToCart')->name('home#addToCart');

        // Thank You
        Route::get('thank-u', 'HomeController@thankUPage')->name('home#thankU');
    });
});
