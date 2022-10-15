<?php

namespace App\Http\Requests;

use Couchbase\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditParametrsValidationRequest extends FormRequest
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
     * Правила заполнения редактирования параметров
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'name' => [
                'required',
                Rule::unique('telegram_settings', 'name')
                ->ignore($this->route('telegramSetting'))
            ],
        'val' => 'required'
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
                'name.required' => 'Поле названия обязательно для заполнения названия',
                'name.unique' => 'Поле :input уже существует',
                'val.required' => 'Поле значения обязательно для заполнения названия'
            ];
    }
}
