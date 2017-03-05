<?php

namespace App\Http\Controllers;

use App\Squid;
use Illuminate\Http\Request;

class SquidController extends Controller
{

    protected $path_squid_log = 'C:\squid\var\logs';
    protected $name_squid_log = 'access.log';

    public function parseLogs(Request $request){
        $file_path = $this->path_squid_log . '\\' . $this->name_squid_log;
        $file = file($file_path);
        $count_records_log = Squid::count();
        if($count_records_log > 0){
        }else{
            foreach ($file as $item) {
                $arr_val = preg_split('/[?^\s]+/', $item);
                dd($arr_val);
            }
            dd($file);
        }
//        echo '<pre>';
//print_r($val);sssxvxc
//        var_dump(date('d.m.Y H:i:s', $val[0]), $val[0], strtotime(date('d.m.Y H:i:s', $val[0])));
//        echo '</pre>';
    }
}
