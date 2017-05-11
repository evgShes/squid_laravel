<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Apache</title>
</head>
<body>
<table class="bordered highlight responsive-table">
    <thead>
    <tr>
        <th>Ф.И.О/ ИП адрес</th>
        <th>Отдел</th>
        <th>Дата и время</th>
        <th>Тип соединения</th>
        <th>Адрес/порт</th>
        <th>Количество трафика</th>
    </tr>
    </thead>
    <tbody>

    @foreach($records as $record)
        <?php
        $user_data = $record->relUser;
        ?>
        <tr>
            <td>{{ $user_data->employer_name or $record->client_address}}</td>
            <td>@if(!empty($user_data->employer_department)) {{ $user_data->getDepartment()[$user_data->employer_department] }} @endif</td>
            <td>{{ $record->time_convert or ''}}</td>
            <td>{{ $record->request_method or '' }}</td>
            <td>{{ $record->url or '' }}</td>
            <td>@if(!empty(mb_strimwidth ($record->bytes / 1024,0, 4))){{ mb_strimwidth($record->bytes / 1024,0, 4) }}@else
                    0 @endifМб
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
{{--{{ dd($records->first()) }}--}}

