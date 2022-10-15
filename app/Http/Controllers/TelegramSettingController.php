<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditParametrsValidationRequest;
use App\Http\Requests\ParametrsValidationRequest;
use App\Models\TelegramSetting;
use Illuminate\Http\Request;

class TelegramSettingController extends Controller
{
    /**
     * Возвращение представления index в telegramSetting, а также вывод всех настроек
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $telegramSetting = TelegramSetting::all();
        return view('telegramSetting.index', compact('telegramSetting'));
    }

    /**
     * Вызов страницы создания настроек
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('telegramSetting.create');
    }

    /**
     * Функция для создания настроек
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ParametrsValidationRequest $request)
    {
        TelegramSetting::create($request->validated());
        return redirect()->route('telegram-setting.index')->with(['success'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TelegramSetting  $telegramSetting
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(TelegramSetting $telegramSetting)
    {
        # Здесь из-за ненадобности мы  перекидываем от куда пришел пользователь
        # Так как мы всю информацию вывели на панели со списком
        return back();
    }

    /**
     * Вызов страницы редактирования настроек
     *
     * @param  \App\Models\TelegramSetting  $telegramSetting
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(TelegramSetting $telegramSetting)
    {
        return view('telegramSetting.edit', compact('telegramSetting'));
    }

    /**
     * Функция для изменения настроек
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TelegramSetting  $telegramSetting
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditParametrsValidationRequest $request, TelegramSetting $telegramSetting)
    {
        $telegramSetting->update($request->validated());
        return back()->with(['success' => true]);
    }

    /**
     * Функция для удаления имеющейся настройки
     *
     * @param  \App\Models\TelegramSetting  $telegramSetting
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(TelegramSetting $telegramSetting)
    {
        # Удаляем элемент
        $telegramSetting->delete();
        return back()->with(['successError' => true]);
    }
}
