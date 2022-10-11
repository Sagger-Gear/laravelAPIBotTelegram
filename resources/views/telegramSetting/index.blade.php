@extends('welcome')

@section('title', 'Страница настройки Telegram')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col"></div>
            <div class="col-12 col-md-6">
                <table class="table">
                    <tr>
                        <th>Название параметра</th>
                        <th>Значение параметра</th>
                    </tr>

                    @each('telegramSetting.row', $telegramSetting, 'setting', 'telegramSetting.rowEmpty')
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
