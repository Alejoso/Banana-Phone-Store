<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceLineRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'unit_price' => 'required|float|min:0',
            'discount' => 'required|float|min:0',
            'quantity' => 'required|integer|min:0',
            'reason' => 'required|max:255',
            'invoice_id' => 'required|integer|exists:invoices,id'/*,
            'phone_id' => 'required|integer|exists:phones,id'*/
        ];
    }
}
