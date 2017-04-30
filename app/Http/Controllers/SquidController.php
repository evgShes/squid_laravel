<?php

namespace App\Http\Controllers;

use App\Squid;
use App\User;
use App\UsersList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SquidController extends Controller
{
    use FunctionTrait;


    public function mainFunc(Request $request)
    {

        dd($this->parseLogs());
        dd(Storage::disk('local')->exists('files/bKUY8gBCMrQgbnHdLlrLiYeMNLmLB7G2SMSZ6DpC.jpeg'));
//        dd(parse_url('https://vk.com/feed'));
//        dd(exec("squid -n Squid -f c:/squid/etc/squid.conf -k reconfigure"));
//        dd($this->initialDeny());
//        if($this->initialDeny()){
//        $this->squidRestart();
//        }
    }


    public function getAclDeny()
    {
        $string = sprintf('
# inicialise shes api 
acl deny_rules dst "%s" 
acl domain_rules dstdomain "%s" 
http_access deny domain_rules 
http_access deny deny_rules 
# end shes api
', $this->path_id_deny_rules, $this->path_domains_rules);
        return $string;
    }

    public function getPathAccessLog()
    {
        return $this->path_squid . $this->path_squid_log;
    }

    public function getPathSquidConf()
    {
        return $this->path_squid . $this->path_squid_conf;
    }

    public function parseLogs()
    {
        $response = false;
        $file_path = $this->getPathAccessLog();
        if (file_exists($file_path)) {
            $file = file($file_path);
            $file = file($file_path);
            $count_records_log = Squid::count();
            if ($count_records_log > 0) {
                $last_record_in_table = Squid::orderBy('id', 'desc')->first();
                $last_line_in_log_arr = preg_grep("/$last_record_in_table->time/", $file);
                if (!empty($last_line_in_log_arr)) {
                    $key = key($last_line_in_log_arr) + 1;
                    $slice = array_slice($file, $key);
                    if (!empty($slice)) {
                        $save = $this->saveSquid($slice);
                    }
                    $response = true;
                }
            } else {
                $save = $this->saveSquid($file);
                $response = true;
            }
        } else {
            echo "No directory";
        }
        return $response;
    }

    public function saveSquid($array_from_log = [])
    {
        if (empty($array_from_log)) {
            return false;
        } else {
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
            return true;
        }
    }

    public function squidRestart(Request $request)
    {
        $response = false;
        $stop = shell_exec("net stop Squid");
        if ($stop) {
            shell_exec("net start Squid");
            $response = true;
        }
//        $recon = shell_exec("squid -n Squid -f c:/squid/etc/squid.conf -k reconfigure");
//        if ($recon) $response = true;
        if ($request->ajax()) return response()->json(true);
        return $response;
    }


    public function initialDeny()
    {
        $response = false;
        $file = $this->path_id_deny_rules;
        if (file_exists($file)) {
            $acc_conf_path = $this->getPathSquidConf();
            $acl_deny_string = $this->getAclDeny();
            if ($this->searchInFile($acc_conf_path, $acl_deny_string)) {
                $response = true;
            } else {
                $file_content = file_get_contents($acc_conf_path);
                $anchor = $this->anchor_config;
                $position = stripos($file_content, $anchor);
                $insert_string = substr($file_content, 0, $position) . $this->end . $acl_deny_string . $this->end . substr($file_content, $position);
                $rule_put = File::put($acc_conf_path, $insert_string);
                if ($rule_put) {
                    $response = true;
                }
            };
        }
        return $response;
    }

    public function searchInFile($file, $search)
    {
        if (!empty($file) && file_exists($file)) {
            $get_content = file_get_contents($file);
            if (stristr($get_content, $search)) {
                return true;
            } else {
                return false;
            }
        }
    }


    public function viewSquidLog(Request $request)
    {
        $squid_cont = new SquidController();
        $squid_cont->parseLogs();
        $data = [];
        $records = Squid::with('relUser');
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
//        dd($data);
        return view('users.users', $data);
    }

    public function viewReport()
    {
        $users = UsersList::all();
        $data = [
            'users' => $users
        ];
        return view('control_panel.report', $data);
    }

    public function getReport(Request $request)
    {

        $records = Squid::with('relUser');
        if ($request->has('user')) {
            $user_id = $request->user;
            $user = UsersList::find($user_id);
            $records->where('client_address', $user->employer_ip);
        }

        if ($request->has('report_type')) {
            $type = $request->report_type;
            switch ($type) {
                case 1:
                    $date = date_create(null);
                    dd(strftime('%m', strtotime('first day of previous month')));
                    break;
                case 2:

                    break;
                case 3:

                    break;
            }
        }
        dd($request->all(), $records->get());

        return redirect()->back();
    }
}
