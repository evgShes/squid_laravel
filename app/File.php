<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use ModelTrait;
    protected $fillable = [
        'path',
        'originalName',
        'mimeType',
        'size',
        'extension',
    ];


    public static function saveFile($file, $file_path){
        $model = new static();
        $data = [
            'path'=>$file_path,
            'originalName'=>$file->getClientOriginalName(),
            'mimeType'=>$file->getMimeType(),
            'size'=>$file->getClientSize(),
            'extension'=>$file->extension(),
        ];

        return $model->create($data);
    }

}
