@extends("layouts.default")
@section('content')

    <div class="form_add_users">
        <div class="row">
            <div class="col m6 input-field">
                <input type="text" class="" name="employer_name" id="employer_name">
                <label for="employer_name">Ф.И.О. сотрудника:</label>
            </div>
            <div class="col m6 input-field"><input type="text" name="employer_ip" id="employer_ip"><label for="employer_ip">IP рабочего места сотрудника:</label></div>
        </div>
        <div class="row">
            <div class="input-field col m6">
                <select name="employer_department">
                    <option value="" selected disabled>Выбирите отдел:</option>
                    <option value="1">Отдел кадров</option>
                    <option value="2">Отдел тестирования</option>
                    <option value="3">Отдел разработки</option>
                    <option value="4">Транспортный отдел</option>
                    <option value="5">Финансово-бухгалтерский отдел</option>
                    <option value="6">Отдел маркентинга</option>
                    <option value="7">Хозяйственный отдел</option>
                    <option value="8">Юрисконсульт</option>
                </select>
                <label>Отдел:</label>
            </div>
            <div class="input-field col m6">

                <input type="text" class="" id="employer_post" name="employer_post">
                <label for="employer_post">Должность:</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col m6">
                <input type="email" id="employer_email" class="validate" name="employer_email">
                <label for="employer_email" data-error="Формат e-mail должен быть в формате example@ex.le">E-mail сотрудника:</label>
            </div>
            <div class="input-field col m6">
                <input type="tel" id="employer_phone" name="employer_phone" class="validate">
                <label for="employer_phone">Телефон сотрудника:</label>
            </div>
        </div>

    </div>
    {{--<div class="row">--}}
        {{--<div class="col m6 input-field"><label for="employer_password">Пароль:</label><input type="password" id="employer_password"></div>--}}
        {{--<div class="col m6 input-field"><label for="employer_repeat_password">Повторите пароль:</label><input type="password" id="employer_repeat_password"></div>--}}
    {{--</div>--}}

    <div class="row">
        <div class="col offset-m10 m2 input-field  ">
            <button class="btn waves-light green waves-effect" type="button" id="add_users" data-url="{{ route('user.save') }}">Добавить</button>
        </div>
    </div>

@stop