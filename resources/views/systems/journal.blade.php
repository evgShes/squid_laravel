@extends("layouts.default")
@section('content')
    <h4 class="center">Журнал отчетов</h4>
    <div class="row">
        <div class="col m12">
            <table class="bordered highlight responsive-table">
                <thead>
                <tr>
                    <th>Кто совершил запрос</th>
                    <th>Сотрудник</th>
                    <th>Дата С</th>
                    <th>Дата ПО</th>
                    <th>Общее количество трафика (Мб)</th>
                </tr>
                </thead>
                <tbody>
                {{--@foreach($users as $user)--}}
                    {{--<tr>--}}
                        {{--<td>{{ $user->employer_name or '' }}</td>--}}
{{--                        <td>{{ $user->employer_ip or '' }}</td>--}}
{{--                        <td>{{ $user->getDepartment() }}</td>--}}
{{--                        <td>{{ $user->employer_post or '' }}</td>--}}
{{--                        <td>{{ $user->employer_email or '' }}</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                <tr>
                    <td>Феденко Кристина Юрьевна</td>
                    <td>Феденко Кристина Юрьевна</td>
                    <td>01.04.2017</td>
                    <td>30.04.2017</td>
                    <td>975360</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    {{--<div class="row">--}}
        {{--<div class="col m2 offset-m8">--}}
            {{--<button class="btn  red darken-1 waves-effect" type="button">Удалить</button>--}}
        {{--</div>--}}
        {{--<div class="col m2">--}}
            {{--<button class="btn amber lighten-1 waves-effect" type="button">Отредактировать</button>--}}
        {{--</div>--}}
    {{--</div>--}}

@stop