<?php

namespace App\Http\Requests\Admin;

use App\Enum\RequestMessagesEnum;
use Illuminate\Foundation\Http\FormRequest;

class AArticleRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        if(!isset($this->user_id)) {
            $this->merge([
                'user_id' => $this->user()->id,
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'title' => 'required|max:255',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'exists' => 'Данного пользователя не существует',
            'required' => RequestMessagesEnum::REQUIRED,
            'max' => RequestMessagesEnum::MAX . ':max символов',
        ];
    }
}
