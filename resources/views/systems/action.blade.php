@extends("layouts.default")
@section('content')
    <h4 class="center-align">Активность</h4>
    <div class="row">
        <div class="col m12" style="overflow: auto">
            <table class="bordered highlight responsive-table" id="">
                <thead>
                <tr>
                    <th>Ф.И.О/ ИП адрес</th>
                    <th>Состояние</th>
                    <th>Дата и время "С"</th>
                    <th>Дата и время "ПО"</th>
                    <th>Количество запросов в минуту</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Шаповалов Евгений Станиславович</td>
                    <td>активный</td>
                    <td>05.05.2017</td>
                    <td>12.05.2017</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>Феденко Кристина Юрьевна</td>
                    <td>заблокирован</td>
                    <td>15.03.2017</td>
                    <td>22.03.2017</td>
                    <td>11</td>
                </tr>
                <tr>
                    <td>Станькова Анна Георгиевна</td>
                    <td>активный</td>
                    <td>14.02.2017</td>
                    <td>17.02.2017</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>Ветров Михаил Степанович</td>
                    <td>активный</td>
                    <td>03.01.2017</td>
                    <td>09.01.2017</td>
                    <td>1</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="input-field col m2 offset-m8">
            <button class="btn waves-effect waves-light deep-purple" type="button">
                Заблокировать
            </button>
        </div>
        <div class="input-field col m2">
            <button class="btn waves-effect waves-light blue" type="button">
                Разблокировать
            </button>
        </div>
    </div>
@stop