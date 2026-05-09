<?php

use Illuminate\Support\Facades\Route;

Route::get('/mostPurchasedPhones' , 'App\Http\Controllers\Api\mostPurchasedPhonesApiController@mostPurchasedPhones')->name('api.phones.mostPurchasedPhones');
