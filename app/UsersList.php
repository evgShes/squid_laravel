<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersList extends Model
{
    protected $fillable = [
        'employer_name',
        'employer_ip',
        'employer_department',
        'employer_post',
        'employer_email',
        'employer_phone',
    ];
}
