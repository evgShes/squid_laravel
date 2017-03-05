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

    public function setTimeConvertAttribute($value){
        return date_create($value)->format('Y-m-d H:i:s');
    }
    public function getTimeConvertAttribute($value){
        return $this->attributes['time_convert'] = date_create($value)->format('Y-m-d H:i:s');
    }
}
