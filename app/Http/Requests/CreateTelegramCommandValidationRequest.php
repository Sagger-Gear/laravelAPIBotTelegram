<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTelegramCommandValidationRequest extends FormRequest
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
     *  Правила заполнения создания команд
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'command' => 'required|unique:telegram_commands',
            'context' => 'required'
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
                    'command.required' => 'Поле команды обязательно для заполнения названия',
                    'command.unique' => 'Поле :input уже существует',
                    'context.required' => 'Поле контекста обязательно для заполнения названия'
                ];
        }
}

