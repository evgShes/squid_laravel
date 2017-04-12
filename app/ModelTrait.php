<?php
/**
 * Created by PhpStorm.
 * User: shes
 * Date: 01.04.2017
 * Time: 20:17
 */

namespace App;


trait ModelTrait
{

    public static function trtCreateOrEdit($attribute = [], $id = null){
        $model = new static();
        $model->firstOrNew(['id'=>$id]);
        $model->fill($attribute);
        $model->save();
        return $model;
    }
}