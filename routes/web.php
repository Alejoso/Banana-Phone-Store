<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Unregistered user
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

Route::get('/phone', 'App\Http\Controllers\PhoneController@index')->name('phone.index');
Route::get('/phone/search', 'App\Http\Controllers\PhoneController@search')->name('phone.search');
Route::get('/phone/{id}', 'App\Http\Controllers\PhoneController@show')->name('phone.show');

Route::get('/office', 'App\Http\Controllers\OfficeController@index')->name('office.index');
Route::get('/office/{id}', 'App\Http\Controllers\OfficeController@show')->name('office.show');

Route::post('/language-switch', 'App\Http\Controllers\LanguageController@changeLanguage')->name('language.switch');

// Authenticated user

Route::middleware('auth')->group(function () {
    // Cart
    Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
    Route::get('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
    Route::post('/cart/update/{id}', 'App\Http\Controllers\CartController@update')->name('cart.update');
    Route::get('/cart/remove/{id}', 'App\Http\Controllers\CartController@remove')->name('cart.remove');
    Route::get('/cart/removeAll/', 'App\Http\Controllers\CartController@removeAll')->name('cart.removeAll');
    Route::get('/cart/show/', 'App\Http\Controllers\CartController@show')->name('cart.show');
    Route::post('cart/purchase', 'App\Http\Controllers\PurchaseController@purchase')->name('purchase.purchase');

    // Saving account
    Route::get('/savingsAccount', 'App\Http\Controllers\SavingsAccountController@index')->name('savingsAccount.index');
    Route::get('/savingsAccount/create', 'App\Http\Controllers\SavingsAccountController@create')->name('savingsAccount.create');
    Route::post('/savingsAccount', 'App\Http\Controllers\SavingsAccountController@save')->name('savingsAccount.save');
    Route::get('/savingsAccount/{id}', 'App\Http\Controllers\SavingsAccountController@show')->name('savingsAccount.show');
    Route::delete('/savingsAccount/{id}', 'App\Http\Controllers\SavingsAccountController@destroy')->name('savingsAccount.destroy');
    Route::get('/savingsAccount/{id}/edit', 'App\Http\Controllers\SavingsAccountController@edit')->name('savingsAccount.edit');
    Route::put('/savingsAccount/{id}', 'App\Http\Controllers\SavingsAccountController@update')->name('savingsAccount.update');

    // User
    Route::get('/user/{id}', 'App\Http\Controllers\UserController@show')->name('user.show');
    Route::get('/user/{id}/edit', 'App\Http\Controllers\UserController@edit')->name('user.edit');
    Route::put('/user/{id}', 'App\Http\Controllers\UserController@update')->name('user.update');

    // Invoice
    Route::get('/invoice', 'App\Http\Controllers\InvoiceController@index')->name('invoice.index');
    Route::get('/invoice/{id}', 'App\Http\Controllers\InvoiceController@show')->name('invoice.show');

});

// Admin

Route::middleware('admin')->group(function () { // Check this, it should be admin

    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');

    // Phone
    Route::get('admin/phone', 'App\Http\Controllers\Admin\AdminPhoneController@index')->name('admin.phone.index');
    Route::get('admin/phone/create', 'App\Http\Controllers\Admin\AdminPhoneController@create')->name('admin.phone.create');
    Route::post('admin/phone/save', 'App\Http\Controllers\Admin\AdminPhoneController@save')->name('admin.phone.save');
    Route::get('admin/phone/mostPurchased', 'App\Http\Controllers\Admin\AdminPhoneController@mostPurchased')->name('admin.phone.mostPurchased');
    Route::get('admin/phone/{id}', 'App\Http\Controllers\Admin\AdminPhoneController@show')->name('admin.phone.show');
    Route::delete('admin/phone/{id}', 'App\Http\Controllers\Admin\AdminPhoneController@destroy')->name('admin.phone.destroy');
    Route::get('admin/phone/{id}/edit', 'App\Http\Controllers\Admin\AdminPhoneController@edit')->name('admin.phone.edit');
    Route::put('admin/phone/{id}', 'App\Http\Controllers\Admin\AdminPhoneController@update')->name('admin.phone.update');

    // Office
    Route::get('admin/office', 'App\Http\Controllers\Admin\AdminOfficeController@index')->name('admin.office.index');
    Route::get('admin/office/create', 'App\Http\Controllers\Admin\AdminOfficeController@create')->name('admin.office.create');
    Route::post('admin/office/save', 'App\Http\Controllers\Admin\AdminOfficeController@save')->name('admin.office.save');
    Route::get('admin/office/top', 'App\Http\Controllers\Admin\AdminOfficeController@topOffices')->name('admin.office.topOffices');
    Route::get('admin/office/{id}', 'App\Http\Controllers\Admin\AdminOfficeController@show')->name('admin.office.show');
    Route::delete('admin/office/{id}', 'App\Http\Controllers\Admin\AdminOfficeController@destroy')->name('admin.office.destroy');
    Route::get('admin/office/{id}/edit', 'App\Http\Controllers\Admin\AdminOfficeController@edit')->name('admin.office.edit');
    Route::put('admin/office/{id}', 'App\Http\Controllers\Admin\AdminOfficeController@update')->name('admin.office.update');

    // Invoice
    Route::get('admin/invoice', 'App\Http\Controllers\Admin\AdminInvoiceController@index')->name('admin.invoice.index');
    Route::get('admin/invoice/{id}', 'App\Http\Controllers\Admin\AdminInvoiceController@show')->name('admin.invoice.show');
    Route::get('admin/invoice/{id}/edit', 'App\Http\Controllers\Admin\AdminInvoiceController@edit')->name('admin.invoice.edit');
    Route::put('admin/invoice/{id}', 'App\Http\Controllers\Admin\AdminInvoiceController@update')->name('admin.invoice.update');
    Route::delete('admin/invoice/{id}', 'App\Http\Controllers\Admin\AdminInvoiceController@destroy')->name('admin.invoice.destroy');

    // SavingsAccount
    Route::get('admin/savingsAccount', 'App\Http\Controllers\Admin\AdminSavingsAccountController@index')->name('admin.savingsAccount.index');
    Route::get('admin/savingsAccount/create', 'App\Http\Controllers\Admin\AdminSavingsAccountController@create')->name('admin.savingsAccount.create');
    Route::post('admin/savingsAccount', 'App\Http\Controllers\Admin\AdminSavingsAccountController@save')->name('admin.savingsAccount.save');
    Route::get('admin/savingsAccount/{id}', 'App\Http\Controllers\Admin\AdminSavingsAccountController@show')->name('admin.savingsAccount.show');
    Route::delete('admin/savingsAccount/{id}', 'App\Http\Controllers\Admin\AdminSavingsAccountController@destroy')->name('admin.savingsAccount.destroy');
    Route::get('admin/savingsAccount/{id}/edit', 'App\Http\Controllers\Admin\AdminSavingsAccountController@edit')->name('admin.savingsAccount.edit');
    Route::put('admin/savingsAccount/{id}', 'App\Http\Controllers\Admin\AdminSavingsAccountController@update')->name('admin.savingsAccount.update');

    // User
    Route::get('admin/user', 'App\Http\Controllers\Admin\AdminUserController@index')->name('admin.user.index');
    Route::get('admin/user/create', 'App\Http\Controllers\Admin\AdminUserController@create')->name('admin.user.create');
    Route::post('admin/user', 'App\Http\Controllers\Admin\AdminUserController@save')->name('admin.user.save');
    Route::get('admin/user/{id}', 'App\Http\Controllers\Admin\AdminUserController@show')->name('admin.user.show');
    Route::delete('admin/user/{id}', 'App\Http\Controllers\Admin\AdminUserController@destroy')->name('admin.user.destroy');
    Route::get('admin/user/{id}/edit', 'App\Http\Controllers\Admin\AdminUserController@edit')->name('admin.user.edit');
    Route::put('admin/user/{id}', 'App\Http\Controllers\Admin\AdminUserController@update')->name('admin.user.update');

});

Auth::routes();
