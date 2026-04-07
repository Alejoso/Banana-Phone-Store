<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => ['required', 'max:255', Rule::unique('users', 'email')->ignore($this->route('id'))],
            'password' => 'nullable | string |min:8| confirmed',
            'national_id' => 'required|max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'role' => 'required|in:Admin,Client',
            'phone_number' => 'required|max:14',
            'birthday' => 'required|date',
            'address' => 'required|max:500',
        ];
    }
}
