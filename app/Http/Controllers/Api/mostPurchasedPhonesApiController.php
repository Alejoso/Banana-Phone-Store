<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller; 
use App\Models\Phone; 
use Illuminate\Http\JsonResponse; 
use App\Http\Resources\mostPurchasedPhonesResource;

class mostPurchasedPhonesApiController extends Controller
{
    public function mostPurchasedPhones(): JsonResponse
    {
        $mostPurchasedPhones = Phone::withSum('invoiceLines', 'quantity')->orderBy('invoice_lines_sum_quantity', 'desc')->take(5)->get();
        $mostPurchasedPhonesResource = mostPurchasedPhonesResource::collection($mostPurchasedPhones);

        return response()->json($mostPurchasedPhonesResource , 200);
    }
}   
    
