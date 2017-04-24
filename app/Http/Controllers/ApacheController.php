<?php

namespace App\Http\Controllers;

use App\Apache;
use Illuminate\Http\Request;
use App\UsersList;
use Monolog\Handler\DynamoDbHandler;

class ApacheController extends Controller
{

    protected $contData = [
        'model' => Apache::class,
    ];
    protected $path_root;
    protected $name_log;
    protected $end = PHP_EOL;
    public function __construct()
    {
        $this->path_root = config('apache.path_apache_log');
        $this->name_log = config('apache.name_apache_log');
    }

    public function test(Request $request)
    {
//        dd(env('NAME_APACHE_LOG'));
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
        if (file_exists($file_path)) {
            $file = file($file_path);
            $model = $this->contData['model'];
            $file = file($file_path);
            $count_records_log = $model::count();
            if ($count_records_log > 0) {
                $last_record_in_table = Apache::orderBy('id', 'desc')->first();
                $data_search = $last_record_in_table->all . $this->end;
                $last_line_in_log_arr = array_search($data_search, $file);
                if ($last_line_in_log_arr !== false) {
                    $key = $last_line_in_log_arr + 1;
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
            echo "No directory: $file_path";
        }
        return $response;
    }


    public function save($array_from_log = [])
    {
        if (empty($array_from_log)) {
            return false;
        } else {
            foreach ($array_from_log as $item) {
                $regex = config('apache.regex');
                $arr_val = preg_match($regex, $item, $matches);
//                dd($regex,$matches);
                $data_save = [
                    'all' => $matches[0],
                    'server_name' => $matches[1],
                    'client_address' => $matches[2],
                    'time' => $matches[3],
                    'time_convert' => $matches[3],
                    'method' => $matches[4],
                    'str_query' => $matches[5],
                    'status' => $matches[6],
                    'url_source' => $matches[7],
                    'user_agent' => $matches[8],
                    'size_no_head' => $matches[9],
                    'size_head' => $matches[10],
                    'size_send' => $matches[11],
                    'size_response' => $matches[12],
                    'time_request' => $matches[13],
                ];
                $record = Apache::create($data_save);
            }
            return true;
        }
    }

    public function view(Request $request)
    {
        $data = [];
        $model = Apache::class;
        $view = 'apache.apache_log';
        $records = $model::with('relUser');
        if ($request->search) {
            if ($request->has('all_employer')) {
                $id_user_arr = $request->all_employer;
                $user_ip = UsersList::whereIn('id', $id_user_arr)->pluck('employer_ip');
                if ($user_ip) {
                    $records->whereIn('client_address', $user_ip);
                    $data['user_id'] = $id_user_arr;
                }
            }

            if ($request->has('all_date_from_submit') && $request->has('all_date_to_submit')) {
                $date_from = date_create($request->all_date_from_submit)->format('Y.m.d') . ' 00:00:00';
                $date_to = date_create($request->all_date_to_submit)->format('Y.m.d') . ' 23:59:59';
                $records->whereBetween('time_convert', [$date_from, $date_to]);
                $data['date_from'] = $date_from;
                $data['date_to'] = $date_to;
            }

        }
        $records = $records->orderBy('id', 'desc')->paginate(15);
        $data = array_merge($data, [
            'records' => $records,
            'users' => UsersList::all(),
        ]);
        return view($view, $data);
    }

}
