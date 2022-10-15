{{--Шаблон вывода всех настроек telegram--}}
<tr>
    <td>{{ $setting->name }}</td>
    <td>{{ $setting->val }}</td>
    <td>
        <div class="btn-group" role="group" aria-label="Функционал программы">
            <a href="{{ route('telegram-setting.edit', $setting->id) }}" type="button" class="btn btn-sm btn-warning">Редактировать</a>
            {{--data - универсальный элемент хранения параметров для передачи, мы будем хранить в нем ID элемента--}}
            <button type="button"
                    class="btn btn-sm btn-danger destroy"
                    data-bs-toggle="modal"
                    data-bs-target="#getOpenDestroyModalWindow"
                    data-id="{{ $setting->id }}">Удалить</button>
        </div>
    </td>
</tr>
