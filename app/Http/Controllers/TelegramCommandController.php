<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTelegramCommandValidationRequest;
use App\Http\Requests\EditTelegramCommandValidationRequest;
use App\Models\TelegramCommand;
use Illuminate\Http\Request;

class TelegramCommandController extends Controller
{
    /**
     * Возвращение представления index в telegramCommand, а также вывод всех значений
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $telegramCommand = TelegramCommand::all();
        return view('telegramCommand.index', compact('telegramCommand'));
    }

    /**
     * Возвращение представления index в telegramCommand с созданием новых команд
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('telegramCommand.create');
    }

    /**
     * Функция для создания новых команд
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateTelegramCommandValidationRequest $request)
    {
        TelegramCommand::create($request->validated());
        return back()->with(['success' => 'true']);
    }

    /**
     * Возвращение представления show в telegramCommand, а также вывод одной команды
     *
     * @param  \App\Models\TelegramCommand  $telegramCommand
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(TelegramCommand $telegramCommand)
    {
        return view('telegramCommand.show', ['command' => $telegramCommand]);
    }

    /**
     * Возвращение представления edit в telegramCommand, с возможностью редактирования команды
     *
     * @param  \App\Models\TelegramCommand  $telegramCommand
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(TelegramCommand $telegramCommand)
    {
        return view('telegramCommand.edit', ['command' => $telegramCommand]);
    }

    /**
     * Функция для редактирования команд
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TelegramCommand  $telegramCommand
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EditTelegramCommandValidationRequest $request, TelegramCommand $telegramCommand)
    {
        $telegramCommand->update($request->validated());
        return back()->with(['success' => true]);
    }

    /**
     * Функция по удалению команды
     *
     * @param  \App\Models\TelegramCommand  $telegramCommand
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(TelegramCommand $telegramCommand)
    {
        $telegramCommand->delete();
        return back()->with(['successError' => true]);
    }
}
