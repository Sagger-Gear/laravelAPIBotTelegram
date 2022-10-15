<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParametrsValidationRequest extends FormRequest
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
     * Правила для создания параметров
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:telegram_settings',
            'val' => 'required'
        ];
    }

    /**
     * Вывод ошибок при неправильном заполнении полей настроек
     *
     * @return array|string[]
     */
    public function messages()
    {
        return parent::messages() +
            [
                'name.required' => 'Поле названия обязательно для заполнения названия',
                'name.unique' => 'Поле :input уже существует',
                'val.required' => 'Поле значения обязательно для заполнения названия'
            ];
    }
}
