<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlockedSite extends Model
{
    protected $fillable = [
        'name',
        'keyword',
        'img',
        'scheme',
        'host',
        'path',
    ];
}
