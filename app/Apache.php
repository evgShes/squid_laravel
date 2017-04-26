<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apache extends Model
{
    protected $fillable = [
        'all',
        'server_name',
        'client_address',
        'time',
        'time_convert',
        'method',
        'str_query',
        'status',
        'url_source',
        'user_agent',
        'size_no_head',
        'size_head',
        'size_send',
        'size_response',
        'time_request',
    ];

    public function getTimeConvertAttribute($value)
    {
        return date('d.m.Y H:i:s', strtotime($value));
    }

    public function setTimeConvertAttribute($value)
    {
        $data = date_create($value)->format('Y-m-d H:i:s');
        return $this->attributes['time_convert'] = $data;
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


    // Scopes
    // Возвращаем записи с методом пост
    public function scopeMethod($query, $type = 'any')
    {
        if ($type == 'any') return $query;
        return $query->where('method', $type);
    }

    // Выборка по статусам
    public function scopeStatus($query, $type = 'any')
    {
        if ($type == 'any') return $query;
        return $query->where('status', $type);
    }
}
