<?php

namespace App\Http\Requests;

use App\Enums\UserTypes;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'fullEnglishName' => 'required|string',
            'fullArabicName' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'country_code' => 'required|string',
        ];
    }
}
