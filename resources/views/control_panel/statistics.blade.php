@extends("layouts.default")
@section('content')
    <form action="{{ route('top.res') }}" method="post">
        <div class="row">
            <div class="input-field col m5">
                <label for="date_from">Начало периода:</label>
                <input type="date" class="date_bootstrap" id="date_from" name="static_date_from">
            </div>
            <div class=" input-field col m5">
                <label for="date_to">Конец периода:</label>
                <input type="date" class="date_bootstrap" id="date_to" name="static_date_to">
            </div>
            <div class="input-field col m2">
                <button class="btn waves-effect waves-light blue" type="button" id="btn-stat">
                    Выбрать
                </button>
            </div>
        </div>
    </form>
    <div id="container" style="min-width: 100%; height: 800px; max-width: 100%; margin: 0 auto"></div>
@stop