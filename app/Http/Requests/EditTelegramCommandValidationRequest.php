<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditTelegramCommandValidationRequest extends FormRequest
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
     * Правила заполнения редактирования команд
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'command'=>[
            'required',
            Rule::unique('telegram_commands', 'command')
                ->ignore($this->route('telegramCommand'))
            ],
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
                'context.required' => 'Поле контекст обязательно для заполнения названия'
            ];
    }
}
