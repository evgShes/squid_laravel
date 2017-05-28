<?php

namespace App\Http\Controllers;

use App\UsersList;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /// test
    public function saveEmployer(Request $request){
        $save_user = UsersList::trtCreateOrEdit($request->all());
    }

    public function usersList()
    {
        $users = UsersList::all();
        return view('users.list_users', ['users'=>$users]);
    }

    public function usersQuota()
    {
        $users = UsersList::all();
        return view('users.users_quota', ['users'=>$users]);
    }
}
