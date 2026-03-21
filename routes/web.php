<?php

use Illuminate\Support\Facades\Route;

// Routes for class Phone

Route::get('/phone', 'App\Http\Controllers\PhoneController@index')->name('phone.index');
Route::get('/phone/create', 'App\Http\Controllers\PhoneController@create')->name('phone.create');
Route::post('/phone/save', 'App\Http\Controllers\PhoneController@save')->name('phone.save');
Route::get('/phone/{id}', 'App\Http\Controllers\PhoneController@show')->name('phone.show');
Route::delete('/phone/{id}', 'App\Http\Controllers\PhoneController@destroy')->name('phone.destroy');
Route::get('/phone/{id}/edit', 'App\Http\Controllers\PhoneController@edit')->name('phone.edit');
Route::put('/phone/{id}', 'App\Http\Controllers\PhoneController@update')->name('phone.update');

// Routes for class Office

Route::get('/office', 'App\Http\Controllers\OfficeController@index')->name('office.index');
Route::get('/office/create', 'App\Http\Controllers\OfficeController@create')->name('office.create');
Route::post('/office/save', 'App\Http\Controllers\OfficeController@save')->name('office.save');
Route::get('/office/{id}', 'App\Http\Controllers\OfficeController@show')->name('office.show');
Route::delete('/office/{id}', 'App\Http\Controllers\OfficeController@destroy')->name('office.destroy');
Route::get('/office/{id}/edit', 'App\Http\Controllers\OfficeController@edit')->name('office.edit');
Route::put('/office/{id}', 'App\Http\Controllers\OfficeController@update')->name('office.update');

// Routes for savingsAccount class

Route::get('savingsAccounts', 'App\Http\Controllers\SavingsAccountController@index')->name('savingsAccounts.index');
Route::get('savingsAccounts/create', 'App\Http\Controllers\SavingsAccountController@create')->name('savingsAccounts.create');
Route::post('savingsAccounts', 'App\Http\Controllers\SavingsAccountController@save')->name('savingsAccounts.save');
Route::get('savingsAccounts/{id}', 'App\Http\Controllers\SavingsAccountController@show')->name('savingsAccounts.show');
Route::delete('savingsAccounts/{id}', 'App\Http\Controllers\SavingsAccountController@destroy')->name('savingsAccounts.destroy');

// Routes for user Class

Route::get('users', 'App\Http\Controllers\UserController@index')->name('users.index');
Route::get('users/create', 'App\Http\Controllers\UserController@create')->name('users.create');
Route::post('users', 'App\Http\Controllers\UserController@save')->name('users.save');
Route::get('users/{id}', 'App\Http\Controllers\UserController@show')->name('users.show');
Route::delete('users/{id}', 'App\Http\Controllers\UserController@destroy')->name('users.destroy');

// Routes for Invoice

Route::get('invoices', 'App\Http\Controllers\InvoiceController@index')->name('invoices.index');
Route::get('invoices/create', 'App\Http\Controllers\InvoiceController@create')->name('invoices.create');
Route::post('invoices/save', 'App\Http\Controllers\InvoiceController@save')->name('invoices.save');
Route::get('invoices/{id}', 'App\Http\Controllers\InvoiceController@show')->name('invoices.show');
Route::get('invoices/{id}/edit', 'App\Http\Controllers\InvoiceController@edit')->name('invoices.edit');
Route::put('invoices/{id}/update', 'App\Http\Controllers\InvoiceController@update')->name('invoices.update');
Route::delete('invoices/{id}/delete', 'App\Http\Controllers\InvoiceController@delete')->name('invoices.delete');

// Routes for InvoiceLine

Route::get('invoiceLines', 'App\Http\Controllers\InvoiceLineController@index')->name('invoiceLines.index');
Route::get('invoiceLines/create', 'App\Http\Controllers\InvoiceLineController@create')->name('invoiceLines.create');
Route::post('invoiceLines/save', 'App\Http\Controllers\InvoiceLineController@save')->name('invoiceLines.save');
Route::get('invoiceLines/{id}', 'App\Http\Controllers\InvoiceLineController@show')->name('invoiceLines.show');
Route::get('invoiceLines/{id}/edit', 'App\Http\Controllers\InvoiceLineController@edit')->name('invoiceLines.edit');
Route::put('invoiceLines/{id}/update', 'App\Http\Controllers\InvoiceLineController@update')->name('invoiceLines.update');
Route::delete('invoiceLines/{id}/delete', 'App\Http\Controllers\InvoiceLineController@delete')->name('invoiceLines.delete');
