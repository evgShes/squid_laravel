<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Squid extends Model
{

    protected $fillable = [
        'time',
        'time_convert',
        'duration',
        'client_address',
        'result_codes',
        'bytes',
        'request_method',
        'url',
        'user',
        'hierarchy_code',
        'type',
    ];

    public function getTimeConvertAttribute($value)
    {
        return date('d.m.Y H:i:s', strtotime($value));
    }

    public function setTimeConvertAttribute($value)
    {
        return $this->attributes['time_convert'] = date('Y-m-d H:i:s', $value);
    }


    public function relUser()
    {
        return $this->hasOne(UsersList::class, 'employer_ip', 'client_address');
    }


    public function getUserNameByIp()
    {
        if (empty($this->relUser)) {
            return null;
        } else {
            return $this->relUser->employer_name;
        }
    }
}
