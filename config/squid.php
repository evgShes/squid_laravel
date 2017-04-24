<?php

return [
    'regex' => '/[?^\s]+/',
    'path_squid' => env('PATH_SQUID'),
    'path_squid_conf' => env('PATH_SQUID_CONF'),
    'path_squid_log' => env('PATH_SQUID_LOG'),
    'anchor_config' => 'http_access',
    'path_deny_rules' => storage_path('squid\ip_deny.txt'),
    'path_domains_rules' => storage_path('squid\domain_deny.txt'),
];