<?php
$log_path = 'C:\squid\var\logs';
$file_name = 'access.log';
$file_path = $log_path . '\\' . $file_name;
$file = file($file_path);
$val = preg_split('/[?^\s]+/', $file[200]);
echo '<pre>';
//print_r($val);sssxvxcwwww
var_dump(date('d.m.Y H:i:s', $val[0]), $val[0], strtotime(date('d.m.Y H:i:s', $val[0])));
echo '</pre>';
