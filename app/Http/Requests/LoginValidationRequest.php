<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginValidationRequest extends FormRequest
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
     * Правила для заполнения поля авторизации
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'login' => 'required',
            'password' => 'required'
        ];
    }

    /**
     * Вывод ошибок при неправильном заполнении полей
     *
     * @return array|string[]
     */
    public function messages()
    {
        return parent::messages() +
            [
                'login.required' => 'Поле логина обязательно для заполнения логина',
                'password.required' => 'Поле пароля обязательно для заполнения пароля'
            ];
    }
}
