@extends("layouts.default")
@section('content')
    <div class="row">
        <div class="col m12">
            <table>
                <thead>
                <th>ИП адрес</th>
                <th>Пользователь</th>
                {{--<th>Отдел</th>--}}
                <th>Обращения к несуществующим адресам</th>
                <th>Обращения к адресам с закрытым доступом</th>
                <th>Число успешных соединений</th>
                <th>Количество отправленных мегабайт</th>
                {{--<th>Тип соединения</th>--}}
                {{--<th>Адрес/порт</th>--}}
                {{--<th>Количество трафика</th>--}}
                </thead>
                <tbody>
                @if($records)
                    @foreach($records as $record)
                        {{--{{ dd($record) }}--}}
                        <tr>
                            <td>{{ $record->client_address or '' }}</td>
                            <td>{{ $record->getUserNameByIp() }}</td>
                            <td>{{ $record->not_found or '' }}</td>
                            <td>{{ $record->forbidden or '' }}</td>
                            <td>{{ $record->ok or '' }}</td>
                            <td>{{ (empty($record->send))?:$record->send.'Мб' }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection