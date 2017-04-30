@extends("layouts.default")
@section('content')
<!--<select class="browser-default" >-->
<!--<option value="" disabled selected>Choose your option</option>-->
<!--<option value="1">Option 1</option>-->
<!--<option value="2">Option 2</option>-->
<!--<option value="3">Option 3</option>-->
<!--</select>-->
{{--<h4 class="truncate center-align">Отчет</h4>--}}
<form action="{{ route('control_panel.report') }}" method="post">
    {{ csrf_field() }}
    <div class="generate_report">
        <div class="row">
            <div class="row">
                <div class=" input-field col s12">
                    <select name="user">
                        <option value="" disabled selected>Выберите пользователя</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->employer_name or '' }}</option>
                        @endforeach
                    </select>
                    <label>Пользователь:</label>
                </div>
            </div>
            <div class="input-field col s12">
                <select id="type_report" name="report_type">
                    <option value="" disabled selected>Выберите тип отчета</option>
                    {{--<option value="1">Годовой</option>--}}
                    <option value="1">Месячный</option>
                    <option value="2">Ежедневный</option>
                    <option value="3">Другое</option>
                </select>
                <label>Тип отчета:</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6">
                <label for="date_from">Начало периода:</label>
                <input type="date" class="date_bootstrap" id="date_from" name="report_date_from">
            </div>
            <div class=" input-field col m6">
                <label for="date_to">Конец периода:</label>
                <input type="date" class="date_bootstrap" id="date_to" name="report_date_to">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="input-field col m2 offset-m10">
            <button class="btn waves-effect waves-light blue" type="submit" id="generate_report" data-url="#">
                Сформировать
            </button>
        </div>
    </div>
</form>
@stop