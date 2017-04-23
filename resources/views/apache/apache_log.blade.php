@extends("layouts.default")
@section('content')
    <form action="{{ route('squid.log') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col m4 input-field">
                {{--{{ dd($user_id) }}--}}
                <select multiple name="all_employer[]">
                    <option value="" disabled>Выберите пользователя</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}"
                                @if(isset($user_id) && in_array($user->id, $user_id)) selected @endif>{{ $user->employer_name or '' }}</option>
                    @endforeach
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
                <button class="btn blue darken-2 pulse  waves-effect" type="submit" name="search" value="1">Найти
                </button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col m12" style="overflow: auto">
            <table class="bordered highlight responsive-table" id="table_log">
            <thead>
            <?php
            $table_title = trans('table.apache');
            ?>
            {{--            {{ dd(trans('table.apache')) }}--}}
            <tr>
                @foreach($table_title as $tab_title)
                    <th>{{ $tab_title }}</th>
                @endforeach
                {{--<th>Ф.И.О/ ИП адрес</th>--}}
                {{--<th>Отдел</th>--}}
                {{--<th>Дата и время</th>--}}
                {{--<th>Тип соединения</th>--}}
                {{--<th>Адрес/порт</th>--}}
                {{--<th>Количество трафика</th>--}}
            </tr>
            </thead>
            <tbody>

            @foreach($records as $record)
                <?php
                $user_data = $record->relUser;
                ?>
                <tr>
                    @foreach($record->toArray() as $key=> $value)
                        @if(array_key_exists($key, $table_title))
                            <td>{{ $value or '' }}</td>
                        @endif
                    @endforeach
                    {{--<td>{{ $user_data->employer_name or $record->client_address}}</td>--}}
                    {{--<td>@if(!empty($user_data->employer_department)) {{ $user_data->getDepartment()[$user_data->employer_department] }} @endif</td>--}}
                    {{--<td>{{ $record->time_convert or ''}}</td>--}}
                    {{--<td>{{ $record->request_method or '' }}</td>--}}
                    {{--<td>{{ $record->url or '' }}</td>--}}
                    {{--<td>@if(!empty(mb_strimwidth ($record->bytes / 1024,0, 4))){{ mb_strimwidth($record->bytes / 1024,0, 4) }}@else--}}
                    {{--0 @endifМб--}}
                    {{--</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
        {{ $records->links() }}
    </div>
@stop
