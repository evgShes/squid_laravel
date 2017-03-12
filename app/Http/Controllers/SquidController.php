<?php

namespace App\Http\Controllers;

use App\Squid;
use Illuminate\Http\Request;

class SquidController extends Controller
{

    protected $path_squid_log = 'C:\squid\var\logs';
    protected $name_squid_log = 'access.log';

    public function parseLogs(Request $request)
    {
        $response = false;
        $file_path = $this->path_squid_log . '\\' . $this->name_squid_log;
        $file = file($file_path);
        $count_records_log = Squid::count();
        if ($count_records_log > 0) {
            $last_record_in_table = Squid::orderBy('id', 'desc')->first();
            $last_line_in_log_arr = preg_grep("/$last_record_in_table->time/", $file);
            if (empty($last_line_in_log_arr)) {
                dd('no record');
            } else {
                $key = key($last_line_in_log_arr) + 1;
                $slice = array_slice($file, $key);

                if (!empty($slice)) {
                    $this->saveSquid($slice);

                }
            }
        } else {
            $this->saveSquid($file);
        }
    }

    public function saveSquid($array_from_log = [])
    {
        foreach ($array_from_log as $item) {
            $arr_val = preg_split('/[?^\s]+/', $item);
            $record = Squid::create([
                'time' => $arr_val[0],
                'time_convert' => $arr_val[0],
                'duration' => $arr_val[1],
                'client_address' => $arr_val[2],
                'result_codes' => $arr_val[3],
                'bytes' => $arr_val[4],
                'request_method' => $arr_val[5],
                'url' => $arr_val[6],
                'user' => $arr_val[7],
                'hierarchy_code' => $arr_val[8],
                'type' => $arr_val[9],
            ]);
        }
    }
}
