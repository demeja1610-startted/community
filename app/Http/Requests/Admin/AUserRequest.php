<?php

namespace App\Http\Requests\Admin;

use App\Enum\PermissionsEnum;
use App\Enum\RequestMessagesEnum;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class AUserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
        ];

        switch($this->method())
        {
            case 'PUT':
                $rules['password'] = 'required|min:8|max:255|confirmed';
                $rules['email'] = 'required|max:255|unique:users,email';

                break;
            case 'PATCH':
                if($this->password !== null) {
                    $rules['password'] = 'min:8|max:255|confirmed';
                }

                break;
            default :

                break;
        }

        if(Gate::check(PermissionsEnum::manage_roles_and_permissions)) {
            $rules['roles'] = 'required';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => RequestMessagesEnum::REQUIRED,
            'max' => RequestMessagesEnum::MAX . ':max символов',
            'min' => RequestMessagesEnum::MIN . ':min символов',
            'roles.required' => 'У пользователя должна быть как минимум одна роль',
            'email.unique' => 'Данный email уже зарегистрирован',
            'confirmed' => 'Пароли не совпадают',
        ];
    }
}
