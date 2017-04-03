<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use ModelTrait;
    protected $fillable = [
        'rel_type',
        'rel_id',
        'path',
        'originalName',
        'mimeType',
        'size',
        'extension',
    ];


    public static function saveFile($file, $file_path, $array_val = []){
        $model = new static();
        $data = array_merge([
            'path'=>$file_path,
            'originalName'=>$file->getClientOriginalName(),
            'mimeType'=>$file->getMimeType(),
            'size'=>$file->getClientSize(),
            'extension'=>$file->extension(),
        ],$array_val);

        return $model->create($data);
    }


    // Relation

    public function files()
    {
        return $this->morphTo(null, 'rel_type', 'rel_id');
    }

}
