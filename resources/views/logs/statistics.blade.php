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
                <th>Обращения к адресам сзакрытым доступом</th>
                <th>Число успешных соединений</th>
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
                            <td>{{ $record->employer_name or '' }}</td>
                            <td>{{ $record->not_found or '' }}</td>
                            <td>{{ $record->forbidden or '' }}</td>
                            <td>{{ $record->ok or '' }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection