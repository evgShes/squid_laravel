<?php

namespace App\Http\Controllers;

use App\Apache;
use Illuminate\Http\Request;

class ApacheController extends Controller
{
    protected $contData = [
        'model' => Apache::class,
    ];
    protected $path_root;
    protected $name_log;

    public function __construct()
    {
        $this->path_root = config('apache.path_apache_log');
        $this->name_log = config('apache.name_apache_log');
    }

    public function test(Request $request)
    {
        dd($this->parseLogs());
    }

    /**
     * @return mixed
     */
    public function getPathRoot()
    {
        return $this->path_root;
    }

    /**
     * @return mixed
     */
    public function getNameLog()
    {
        return $this->name_log;
    }

    public function getFullPathLog()
    {
        return $this->getPathRoot() . '\\' . $this->getNameLog();
    }

    public function parseLogs()
    {
        $response = false;
        $file_path = $this->getFullPathLog();
        $file = file($file_path);
        if (file_exists($file_path)) {
            $model = $this->contData['model'];
            $file = file($file_path);
            $count_records_log = $model::count();
            if ($count_records_log > 0) {
                $last_record_in_table = Squid::orderBy('id', 'desc')->first();
                $last_line_in_log_arr = preg_grep("/$last_record_in_table->time/", $file);
                if (!empty($last_line_in_log_arr)) {
                    $key = key($last_line_in_log_arr) + 1;
                    $slice = array_slice($file, $key);
                    if (!empty($slice)) {
                        $save = $this->save($slice);
                    }
                    $response = true;
                }
            } else {
                $save = $this->save($file);
                $response = true;
            }
        } else {
            echo "No directory";
        }
        return $response;
    }


    public function save($array_from_log = [])
    {
        if (empty($array_from_log)) {
            return false;
        } else {
            foreach ($array_from_log as $item) {
                $reg_str = '/[?^\s]+/';
                $reg_str = '/^([^\s:]+):\s([^\s]+)\s\[([^[\]]+)]\s"(\w+)\s([^"]+)"\s(\d+)\s([^\s]+)\s"([^"]+)"\s"([^"]+)"/';
                $arr_val = preg_match($reg_str, $item, $matches);
//                $arr_val = preg_split($reg_str, $item);
                dd($item, $arr_val, $matches);
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
            return true;
        }
    }
}
