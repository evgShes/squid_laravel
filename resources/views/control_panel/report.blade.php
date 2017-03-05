@extends("layouts.default")
@section('content')
<!--<select class="browser-default" >-->
<!--<option value="" disabled selected>Choose your option</option>-->
<!--<option value="1">Option 1</option>-->
<!--<option value="2">Option 2</option>-->
<!--<option value="3">Option 3</option>-->
<!--</select>-->
{{--<h4 class="truncate center-align">Отчет</h4>--}}
<div class="row">
    <div class="input-field col s12">
        <select>
            <option value="" disabled selected>Выберите тип отчета</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
        </select>
        <label>Тип отчета:</label>
    </div>
</div>
<div class="row">
    <div class="input-field col m6">
        <label for="date_from">Начало периода:</label>
        <input type="date" class="date_bootstrap" id="date_from">
    </div>
    <div class=" input-field col m6">
        <label for="date_to">Конец периода:</label>
        <input type="date" class="date_bootstrap" id="date_to">
    </div>
</div>
<div class="row">
    <div class=" input-field col s12">
        <select>
            <option value="" disabled selected>Выберите пользователя</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
            <option value="3">Option 3</option>
        </select>
        <label>Пользоатель:</label>
    </div>
</div>
<div class="row">
    <div class="input-field col m2 offset-m10">
        <button class="btn waves-effect waves-light blue" type="button">Сформировать</button>

    </div>
</div>

@stop