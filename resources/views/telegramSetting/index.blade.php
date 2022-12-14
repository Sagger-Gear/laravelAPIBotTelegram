{{--Шаблон страницы  редактирования всех параметров telegram--}}
@extends('welcome')

@section('title', 'Страница настройки Telegram')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col"></div>
            <div class="col-12 col-md-6">
                @if(session()->has('successError'))
                    <div class="alert alert-success mt-3 mb-3">Элемент успешно удален</div>
                @endif
                @if(session()->has('success'))
                    <div class="alert alert-success mt-3 mb-3">Новый параметр успешно создан</div>
                @endif
                    <a href="{{ route('telegram-setting.create') }}" class="btn btn-sm btn-success">Создать новый параметр</a>
                <table class="table">
                    <tr>
                        <th>Название параметра</th>
                        <th>Значение параметра</th>
                        <th>Функционал</th>
                    </tr>

                    @each('telegramSetting.row', $telegramSetting, 'setting', 'telegramSetting.rowEmpty')
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>
    @include('components.destroy_modal', ['nameRoute' => 'telegram-setting.index'])
@endsection


