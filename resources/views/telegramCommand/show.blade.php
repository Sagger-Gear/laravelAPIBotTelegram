{{--Шаблон по просмотру одной команды--}}
@extends('welcome')

@section('title', 'Просмотр единичной записи команды')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-12 col-md-6">
                <h2>Команда {{$command->command}}</h2>
                <label class="text-secondary small">Контекст команды</label>
                <p>{{$command->command}}</p>
                <a href="{{ route('telegram-command.index') }}" class="btn btn-sm btn-secondary">Возврат</a>
            </div>
        </div>
    </div>
@endsection
