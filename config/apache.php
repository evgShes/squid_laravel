<?php
return [
    'regex' => '/^([^\s:]+)\s([\S]+)\s\[([^\[\]]+)]\s([\S]+)\s([\S]+\s[\S]+)\s([\S]+)\s"([^"]+)"\s"([^"]+)"\s([\d|-]+)\s([\d|-]+)\s([\d|-]+)\s([\d|-]+)\s([\d|-]+)/',
    'path_apache_log' => 'D:\OpenServer\userdata\logs',
    'name_apache_log' => 'Apache-2.4-x64_queriesa.log',
    'LogFormat' => '%v: %a %t \"%r\" %>s %b \"%{Referer}i\" \"%{User-Agent}i\" %I %O %B',
];