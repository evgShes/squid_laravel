<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
    use SoftDeletes;
    protected $dates = ['created_at'];
    use ModelTrait;
    protected $fillable = [
        'name',
        'domain',
        'scheme',
        'host',
        'path',
        'status',
    ];

    public function relFiles()
    {
        return $this->morphOne(File::class, 'files', 'rel_type', 'rel_id');
    }

    public function scopeBlocked($query)
    {
        return $query->where('status', true);
    }

    public function scopeUnlocked($query)
    {
        return $query->where('status', true)->whereNull('status');
    }
}
