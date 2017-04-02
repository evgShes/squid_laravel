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
                <th>Сайт</th>
                <th>Количество трафика</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Феденко Кристина Юрьевна</td>
                <td>Отдел разработки</td>
                <td>15.02.2017 14:52</td>
                <td>vk.com</td>
                <td>520 Мб</td>
            </tr>
            <tr>
                <td>Феденко Кристина Юрьевна</td>
                <td>Отдел разработки</td>
                <td>15.02.2017 14:52</td>
                <td>vk.com</td>
                <td>520 Мб</td>
            </tr>
            <tr>
                <td>Феденко Кристина Юрьевна</td>
                <td>Отдел разработки</td>
                <td>15.02.2017 14:52</td>
                <td>vk.com</td>
                <td>520 Мб</td>
            </tr>
            <tr>
                <td>Феденко Кристина Юрьевна</td>
                <td>Отдел разработки</td>
                <td>15.02.2017 14:52</td>
                <td>vk.com</td>
                <td>520 Мб</td>
            </tr>
            <tr>
                <td>Феденко Кристина Юрьевна</td>
                <td>Отдел разработки</td>
                <td>15.02.2017 14:52</td>
                <td>vk.com</td>
                <td>520 Мб</td>
            </tr>
            <tr>
                <td>Феденко Кристина Юрьевна</td>
                <td>Отдел разработки</td>
                <td>15.02.2017 14:52</td>
                <td>vk.com</td>
                <td>520 Мб</td>
            </tr>
            <tr>
                <td>Феденко Кристина Юрьевна</td>
                <td>Отдел разработки</td>
                <td>15.02.2017 14:52</td>
                <td>vk.com</td>
                <td>520 Мб</td>
            </tr>
            <tr>
                <td>Феденко Кристина Юрьевна</td>
                <td>Отдел разработки</td>
                <td>15.02.2017 14:52</td>
                <td>vk.com</td>
                <td>520 Мб</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@stop
