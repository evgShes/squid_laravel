<?php

namespace App\Http\Controllers;

use App\Squid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SquidController extends Controller
{

    protected $path_squid;
    protected $path_squid_log;
    protected $path_deny_rules;
    protected $path_squid_conf;
    protected $anchor_config;
    protected $path_domains_rules;
    protected $end = PHP_EOL;


    public function __construct()
    {
        $this->path_squid = config('squid.path_squid');
        $this->path_squid_log = config('squid.path_squid_log');
        $this->path_deny_rules = config('squid.path_deny_rules');
        $this->path_squid_conf = config('squid.path_squid_conf');
        $this->anchor_config = config('squid.anchor_config');
        $this->path_domains_rules = config('squid.path_domains_rules');
    }

    public function mainFunc(Request $request)
    {


//        dd(parse_url('https://vk.com/feed'));
//        dd(exec("squid -n Squid -f c:/squid/etc/squid.conf -k reconfigure"));
        dd($this->initialDeny());
//        if($this->initialDeny()){
//        $this->squidRestart();
//        }
    }


    public function getAclDeny()
    {
        return 'acl deny_rules dst "' . $this->path_deny_rules . '"' . $this->end .
            'acl domain_rules dstdomain "' . $this->path_domains_rules . '"' . $this->end .
            $this->end .
            'http_access deny deny_rules domain_rules' . $this->end;
    }

    public function getPathAccessLog()
    {
        return $this->path_squid . $this->path_squid_log;
    }

    public function getPathSquidConf()
    {
        return $this->path_squid . $this->path_squid_conf;
    }

    public function parseLogs(Request $request)
    {

//        dd($this->squidRestart());
        $response = false;
        $file_path = $this->getAccessLogPath();
        $file = file($file_path);
        $count_records_log = Squid::count();
        if ($count_records_log > 0) {
            $last_record_in_table = Squid::orderBy('id', 'desc')->first();
            $last_line_in_log_arr = preg_grep("/$last_record_in_table->time/", $file);
            if (!empty($last_line_in_log_arr)) {
                $key = key($last_line_in_log_arr) + 1;
                $slice = array_slice($file, $key);

                if (!empty($slice)) {
                    $this->saveSquid($slice);

                }
//                dd('no record');
            }
        } else {
            $this->saveSquid($file);
        }
        return $response;
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

    public function squidRestart()
    {
        $response = false;
        $stop = shell_exec("net stop Squid");
        if ($stop) {
            shell_exec("net start Squid");
            $response = true;
        }
//        $recon = shell_exec("squid -n Squid -f c:/squid/etc/squid.conf -k reconfigure");
//        if ($recon) $response = true;

        return $response;
    }


    public function initialDeny()
    {
        $response = false;
        $file = $this->path_deny_rules;
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
                $rule_put = File::put($acc_conf_path,$insert_string);
                if($rule_put){
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
}
