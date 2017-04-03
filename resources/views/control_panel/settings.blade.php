@extends('layouts.default')
@section('content')

    <div class="row">
        <div class="col m12 section">
            <h5>Выберите заблокированные сайты:</h5>
        </div>
    </div>

    <div class="row">
        <div class="col m2">
            <input type="hidden" value="https://vk.com/">
            <input class="" name="group1" type="checkbox" id="vk"/>
            <label for="vk"><div class="sprite_vk"><span>ВКонтакте</span></div></label>
        </div>
        <div class="col m2">
            <input type="hidden" value="https://ok.ru">
            <input class="" name="group1" type="checkbox" id="odn"/>
            <label for="odn">
                <div class="sprite_odn"><span>Одноклассники</span></div></label>
        </div>
        <div class="col m2">
            <input type="hidden" value="https://www.facebook.com">
            <input class="" name="group1" type="checkbox" id="fb"/>
            <label for="fb"><div class="sprite_fb"><span>Facebook</span></div></label>
        </div>
        <div class="col m2">
            <input type="hidden" value="https://twitter.com">
            <input class="" name="group1" type="checkbox" id="twit"/>
            <label for="twit">
                <div class="sprite_twit"><span>Twitter</span></div></label>
        </div>
        <div class="col m2">
            <input type="hidden" value="https://www.instagram.com">
            <input class="" name="group1" type="checkbox" id="inst"/>
            <label for="inst">
                <div class="sprite_inst"><span>Instagram</span></div></label>
        </div>
        <div class="col m2">
            <input type="hidden" value="https://www.youtube.com">
            <input class="" name="group1" type="checkbox" id="you"/>
            <label for="you">
                <div class="sprite_you"><span>Youtube</span></div></label>
        </div>
        @if(isset($sites))
        @foreach($sites as $site)
               <?php
                $file = $site->relFiles;
                $file_path = (empty($file))? '' :asset($file->path);
               ?>
                <div class="col m2">
                    <input type="hidden" value="{{ $site->domain or '' }}" name="domain">
                    <input class="" name="group1" type="checkbox" id="site_{{ $site->id or '' }}"/>
                    <label for="site_{{ $site->id or '' }}">
                        <div class=""><img src="{{ $file_path }}" alt=""><span>{{ $site->name or '' }}</span></div></label>
                </div>
            @endforeach
        @endif
        <div class="col m2">
            <input type="hidden" value="https://www.youtube.com">
            <input class="" name="group1" type="checkbox" id="you"/>
            <label for="you">
                <div class="sprite_you"><span>Youtube</span></div></label>
        </div>
        <div class="col m2">
            <input type="hidden" value="https://www.youtube.com">
            <input class="" name="group1" type="checkbox" id="you"/>
            <label for="you">
                <div class="sprite_you"><span>Youtube</span></div></label>
        </div>
        <div class="col m2">
            <input type="hidden" value="https://www.youtube.com">
            <input class="" name="group1" type="checkbox" id="you"/>
            <label for="you">
                <div class="sprite_you"><span>Youtube</span></div></label>
        </div>
    </div>
    <div class="row">
        <div class="col m2 offset-m8">
            <button class="btn waves-light spinner-green waves-effect" type="button" data-target="modal_add_site">Добавить сайт</button>
        </div>
        <div class="col m2">
            <a class="btn waves-light green waves-effect" type="button">Сохранить изменения</a>
        </div>
    </div>
    @include('modals.modal_settings')
@stop