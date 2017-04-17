@extends("layouts.default")
@section('content')
    <div class="row">
        <div class="col m4 input-field">
            <select multiple name="all_employer">
                <option value="" disabled>Выбирите пользователя</option>
                <option value="1">Феденко Кристина Юрьевна</option>
                <option value="2"></option>
                <option value="3"></option>
            </select>
            <label>Пользователь:</label>
        </div>
        <div class="col m3 input-field">
            <label for="date_from">Начало периода:</label>
            <input type="date" class="date_bootstrap" id="date_from" name="all_date_from">
        </div>
        <div class="col m3 input-field">
            <label for="date_to">Конец периода:</label>
            <input type="date" class="date_bootstrap" id="date_to" name="all_date_to">
        </div>
        <div class="col m2 input-field  ">
            <button class="btn blue darken-2 pulse  waves-effect" type="button">Найти</button>
        </div>
    </div>
    <div class="row">
    <div class="col m12">
        <table class="bordered highlight responsive-table">
            <thead>
            <tr>
                <th>Ф.И.О. сотружника</th>
                <th>Отдел</th>
                <th>Дата и время</th>
                <th>Тип соединения</th>
                <th>Сайт</th>
                <th>Количество трафика</th>
            </tr>
            </thead>
            <tbody>

            @foreach($records as $record)
                <?php
                $user_data = $record->relUser;
                ?>
                <tr>
                    <td>{{ $user_data->employer_name or ''}}</td>
                    <td>@if(!empty($user_data->employer_department)) {{ $user_data->getDepartment()[$user_data->employer_department] }} @endif</td>
                    <td>{{ $record->time_convert or ''}}</td>
                    <td>{{ $record->request_method or '' }}</td>
                    <td>{{ $record->url or '' }}</td>
                    <td>@if(!empty(mb_strimwidth ($record->bytes / 1024,0, 4))){{ mb_strimwidth($record->bytes / 1024,0, 4) }}
                        мб@endif</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $records->links() }}
    </div>
</div>
@stop
