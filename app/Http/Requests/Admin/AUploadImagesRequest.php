<?php

namespace App\Http\Requests\Admin;

use App\Enum\RequestMessagesEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AUploadImagesRequest extends FormRequest
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
            'images' => 'required',
            'images.*' => 'mimes:jpg,png,jpeg',
        ];
    }

    public function messages()
    {
        return [
            'required' => RequestMessagesEnum::REQUIRED,
            'mimes' => 'Расширение файла должно быть jpg, png или jpeg',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'error' => $validator->errors()->first(),
                'code' => 422,
            ], 422)
        );
    }
}
