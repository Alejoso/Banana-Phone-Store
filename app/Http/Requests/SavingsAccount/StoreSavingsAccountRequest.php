<?php

namespace App\Http\Requests\SavingsAccount;

use Illuminate\Foundation\Http\FormRequest;

class StoreSavingsAccountRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => 'required|max:255',
            'name' => 'required|max:255',
            'balance' => 'required|integer|min:0',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }
}
