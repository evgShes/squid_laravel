<?php
/**
 * Created by PhpStorm.
 * User: shes
 * Date: 09.04.2017
 * Time: 17:38
 */

namespace App\Http\Controllers;


trait FunctionTrait
{
    protected $end = PHP_EOL;
    protected $path_squid;
    protected $path_squid_log;
    protected $path_squid_conf;
    protected $anchor_config;
    protected $path_id_deny_rules;
    protected $path_domains_rules;

    public function __construct()
    {
        $this->path_squid = config('squid.path_squid');
        $this->path_squid_log = config('squid.path_squid_log');
        $this->path_id_deny_rules = config('squid.path_deny_rules');
        $this->path_squid_conf = config('squid.path_squid_conf');
        $this->anchor_config = config('squid.anchor_config');
        $this->path_domains_rules = config('squid.path_domains_rules');
    }

    public function removeString($file_path, $number_string)
    {
        if ($number_string != "")

        {
            $number_string--;
            $file=file($file_path);

            $fp=fopen($file_path,"w");

            for($i=0;$i<sizeof($file);$i++)

            {

                if($i==$number_string)

                {

                    unset($file[$i]);

                }

            }

            fputs($fp,implode("",$file));

            fclose($fp);

        }
    }

}