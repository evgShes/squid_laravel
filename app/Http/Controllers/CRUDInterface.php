<?php
/**
 * Created by PhpStorm.
 * User: shes
 * Date: 02.04.2017
 * Time: 19:45
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

interface CRUDInterface
{
    public function create(Request $request);
//    public function update();
}