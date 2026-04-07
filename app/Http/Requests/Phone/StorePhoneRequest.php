<?php

namespace App\Http\Requests\Phone;

use Illuminate\Foundation\Http\FormRequest;

class StorePhoneRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'memory' => 'required|max:50',
            'ram' => 'required|max:20',
            'battery' => 'required|max:20',
            'brand' => 'required|max:50',
            'price' => 'required|integer|gte:0',
            'quantity' => 'required|integer|gte:0',
            'office_id' => 'required|exists:offices,id',
            'image' => 'nullable|file',
        ];
    }
}
