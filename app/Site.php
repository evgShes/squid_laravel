<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use ModelTrait;
    protected $fillable = [
        'name',
        'domain',
    ];
}
