<?php

namespace App\Http\Controllers;

use App\UsersList;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /// test
    public function saveEmployer(Request $request){
        $save_user = UsersList::trtCreateOrEdit($request->all());
        dd($save_user);
    }

}
