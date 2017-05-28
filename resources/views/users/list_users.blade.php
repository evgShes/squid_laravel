@extends("layouts.default")
@section('content')
    <div class="row">
        <div class="col m12">
            <table class="bordered highlight responsive-table">
                <thead>
                <tr>
                    <th>Ф.И.О. сотрудника</th>
                    <th>IP рабочего места сотрудника</th>
                    <th>Отдел</th>
                    <th>Должность</th>
                    <th>E-mail сотрудника</th>
                    <th>Телефон сотрудника</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->employer_name or '' }}</td>
                    <td>{{ $user->employer_ip or '' }}</td>
                    <td>{{ $user->getDepartment() }}</td>
                    <td>{{ $user->employer_post or '' }}</td>
                    <td>{{ $user->employer_email or '' }}</td>
                    <td>{{ $user->employer_phone or '' }}</td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col m2 offset-m8">
            <button class="btn  red darken-1 waves-effect" type="button">Удалить</button>
        </div>
        <div class="col m2">
            <button class="btn amber lighten-1 waves-effect" type="button">Отредактировать</button>
        </div>
    </div>
@stop