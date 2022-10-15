{{--Шаблон для редактирования имеющихся команд--}}
@extends('welcome')

@section('title', 'Редактирование команды')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="col-12 col-md-6">
                    <a href="{{ route('telegram-command.index') }}" class="text-secondary">Вернуться  на список команд</a>
                    <h2>Редактирование команда {{ $command->command }}</h2>
                    @if(session()->has('success'))
                        <div class="alert alert-success">Ваша команда успешно отредактирована</div>
                    @endif
                    <form action="{{route('telegram-command.update', $command->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('components.input', [
                                                        'input' =>[
                                                            'name' => 'command',
                                                            'label' => 'Введите название команды по примеру: /start',
                                                            'default' => $command->command
                                                            ]
                                                     ])
                        @include('components.textarea', [
                                                        'input' =>[
                                                            'name' => 'context',
                                                            'label' => 'Введите текст который отобразится у пользователя',
                                                            'default' => $command->context
                                                            ]
                                                     ])
                        <input type="submit" class="btn btn-primary" value="Сохранить команду">
                    </form>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>
@endsection
