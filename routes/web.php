<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceLineController;
use Illuminate\Support\Facades\Route;

// Invoice
Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
Route::post('/invoice/save', [InvoiceController::class, 'save'])->name('invoice.save');
Route::put('/invoice/{id}/addInvoiceLine', [InvoiceController::class, 'addInvoiceLine'])->name('invoice.addInvoiceLine');
Route::delete('/invoice/{id}/delete', [InvoiceController::class, 'delete'])->name('invoice.delete');
Route::get('/invoice/{id}', [InvoiceController::class, 'show'])->name('invoice.show');

// InvoiceLine
Route::get('/invoiceLine', [InvoiceLineController::class, 'index'])->name('invoiceLine.index');
Route::get('/invoiceLine/create', [InvoiceLineController::class, 'create'])->name('invoiceLine.create');
Route::post('/invoiceLine/save', [InvoiceLineController::class, 'save'])->name('invoiceLine.save');
Route::delete('/invoiceLine/{id}/delete', [InvoiceLineController::class, 'delete'])->name('invoiceLine.delete');
Route::get('/invoiceLine/{id}', [InvoiceLineController::class, 'show'])->name('invoiceLine.show');
