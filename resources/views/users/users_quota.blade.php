@extends("layouts.default")
@section('content')
    <div class="row">
        <div class=" input-field col s6">
            <select name="user">
                <option value="" disabled selected>Выберите сотрудника</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->employer_name or '' }}</option>
                @endforeach
            </select>
            <label>Сотрудник:</label>
        </div>
        <div class=" input-field col s6">
            <input type="text" name="quota">
            <label>Квота сотрудника:</label>
        </div>
    </div>
    <div class="row">

    </div>
    <div class="row">
        <div class="col m2 offset-m10">
            <button class="btn green accent-4 waves-effect" type="button">Назначить</button>
        </div>
    </div>

@stop