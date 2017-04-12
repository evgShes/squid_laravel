<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteRequest;
use App\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function create(SiteRequest $request)
    {
        $input = $request->except('file');
        $save_site = Site::trtCreateOrEdit($input);

        dd($save_site,$request->all(),$request->file('file'));
    }

}
