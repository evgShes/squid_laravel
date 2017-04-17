<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewsCustomServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $response_data = [];
            $get_alias_route = request()->route()->getName();
            $local_elem = "view_titles.$get_alias_route";

//            dd($get_alias_route,$view_title_arr);
            if (Lang::has($local_elem)) {
                $response_data['view_title'] = Lang::get($local_elem);
            }
//            dd($response_data);
            View::share($response_data);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
