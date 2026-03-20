<?php

use Illuminate\Support\Facades\Route;

// Invoice
Route::get('invoices', 'App\Http\Controllers\InvoiceController@index')->name('invoices.index');
Route::get('invoices/create', 'App\Http\Controllers\InvoiceController@create')->name('invoices.create');
Route::post('invoices/save', 'App\Http\Controllers\InvoiceController@save')->name('invoices.save');
Route::get('invoices/{id}', 'App\Http\Controllers\InvoiceController@show')->name('invoices.show');
Route::get('invoices/{id}/edit', 'App\Http\Controllers\InvoiceController@edit')->name('invoices.edit');
Route::put('invoices/{id}/update', 'App\Http\Controllers\InvoiceController@update')->name('invoices.update');
Route::delete('invoices/{id}/delete', 'App\Http\Controllers\InvoiceController@delete')->name('invoices.delete');

// InvoiceLine
Route::get('invoiceLines', 'App\Http\Controllers\InvoiceLineController@index')->name('invoiceLines.index');
Route::get('invoiceLines/create', 'App\Http\Controllers\InvoiceLineController@create')->name('invoiceLines.create');
Route::post('invoiceLines/save', 'App\Http\Controllers\InvoiceLineController@save')->name('invoiceLines.save');
Route::get('invoiceLines/{id}', 'App\Http\Controllers\InvoiceLineController@show')->name('invoiceLines.show');
Route::get('invoiceLines/{id}/edit', 'App\Http\Controllers\InvoiceLineController@edit')->name('invoiceLines.edit');
Route::put('invoiceLines/{id}/update', 'App\Http\Controllers\InvoiceLineController@update')->name('invoiceLines.update');
Route::delete('invoiceLines/{id}/delete', 'App\Http\Controllers\InvoiceLineController@delete')->name('invoiceLines.delete');
