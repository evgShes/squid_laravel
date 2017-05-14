@extends("layouts.default")
@section('content')
    <form action="{{ route('apache.log') }}" method="post">
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
                <button class="btn blue darken-2 pulse  waves-effect" type="submit" name="search" value="1"
                        id="search_log">Найти
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col m12 input-field">
                <select name="log_type[]" multiple id="log_type">
                    <option value="" disabled>Выберите метод</option>
                    <option value="1" @if(isset($log_type) && in_array('1',$log_type)) selected @endif>Метод "POST"
                    </option>
                    <option value="2" @if(isset($log_type) && in_array('2',$log_type)) selected @endif>Метод "GET"
                    </option>
                    <option value="3" @if(isset($log_type) && in_array('3',$log_type)) selected @endif>Обращение к
                        несуществующим адресам(404)
                    </option>
                    <option value="4" @if(isset($log_type) && in_array('4',$log_type)) selected @endif>Обращение к
                        запрещенным адресам(403)
                    </option>
                </select>
                <label>Метод:</label>
            </div>
        </div>
    </form>
    <div>
        <div class="row" id="update-table">
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
                                    @if($key == 'client_address')
                                        <td>{{ $value or ''}}@if($user_data)({{ $user_data->employer_name }}
                                            ) @endif</td>
                                    @else
                                        <td>{{ $value or '' }}</td>
                                    @endif
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $records->links() }}
        </div>
    </div>
    <div class="row">
        <div class="col md3 offset-m11">
            <button class="btn btn-block green waves-effect" id="update-btn" data-url='{{ route('apache.update') }}'>
                Обновить
            </button>
        </div>
    </div>
@stop
