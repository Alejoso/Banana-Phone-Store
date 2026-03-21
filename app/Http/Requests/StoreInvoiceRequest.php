<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => 'required|date',
            'invoice_lines' => 'required|max:255'/*,
            'custom_user_id' => 'required|integer|exists:users,id',
            'office_id' => 'required|integer|exists:offices,id'*/
        ];
    }
}
