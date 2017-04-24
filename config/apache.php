<?php
return [
    'regex' => '/^([^\s:]+)\s([\S]+)\s\[([^\[\]]+)]\s([\S]+)\s([\S]+\s[\S]+)\s([\S]+)\s"([^"]+)"\s"([^"]+)"\s([\d|-]+)\s([\d|-]+)\s([\d|-]+)\s([\d|-]+)\s([\d|-]+)/',
    'path_apache_log' => env('PATH_APACHE_LOG'),
    'name_apache_log' => env('NAME_APACHE_LOG'),
    'LogFormat' => '"%v %a %t %r %>s \"%{Referer}i\" \"%{User-Agent}i\" %b %I %O %B %D"',
];