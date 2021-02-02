<?php
use App\Http\Controllers\Voyager\OrdersController;
use Illuminate\Support\Facades\Route;


Route::get('/', 'LandingPageController@index')->name('landing-page');

Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');

Route::get('/sub_category', 'SubCategoryController@index')->name('sub_category.index');
Route::get('/category', 'CategoryController@index')->name('category.index');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart/{product}', 'CartController@store')->name('cart.store');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/switchToSaveForLater/{product}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

Route::delete('/saveForLater/{product}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
Route::post('/saveForLater/switchToCart/{product}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');

Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon', 'CouponsController@destroy')->name('coupon.destroy');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');

Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::post('/buynow/{product}', 'BuyNowController@store')->name('buynow.store');
Route::post('/paypal-checkout', 'CheckoutController@paypalCheckout')->name('checkout.paypal');

Route::get('/guestCheckout', 'CheckoutController@index')->name('guestCheckout.index');


Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');
Route::get('/contacts', 'ContactsController@index')->name('contacts');

Route::get('/unguaranteed', 'UnguaranteedController@index')->name('unguaranteed.index');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index')->middleware('auth');
Route::get('/dashboard/add', 'DashboardController@create')->name('dashboard.create');
Route::post('/dashboard/add', 'DashboardController@store')->name('dashboard.store');
Route::get('/dashboard/orders', 'AuthorOrderController@index')->name('dashboard.orders')->middleware('auth');
Route::get('/dashboard/edit/{id}', 'DashboardController@edit')->name('dashboard.edit');
Route::patch('/dashboard/edit/{id}', 'DashboardController@update')->name('dashboard.update');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

     
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'ShopController@search')->name('search');

// Route::get('/search-algolia', 'ShopController@searchAlgolia')->name('search-algolia');

Route::middleware('auth')->group(function () {
    Route::get('/my-profile', 'UsersController@edit')->name('users.edit');
    Route::patch('/my-profile', 'UsersController@update')->name('users.update');

    Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
    Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');
});