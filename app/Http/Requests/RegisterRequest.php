<?php

namespace App\Http\Requests;

use App\Enum\RequestMessagesEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ];
    }

    public function messages() {
        return [
            'required' => RequestMessagesEnum::REQUIRED,
            'email' => RequestMessagesEnum::EMAIL,
            'unique' => 'Данный email уже зарегистрирован',
            'confirmed' => 'Пароли должны совпадать',
        ];
    }
}
