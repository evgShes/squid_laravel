<?php

return [
    'path_squid' => 'C:\squid',
    'path_squid_conf' => '\etc\squid.conf',
    'path_squid_log' => '\var\logs\access.log',
    'anchor_config' => 'http_access',
    'path_deny_rules' => storage_path('squid\deny.txt'),
    'path_domains_rules' => storage_path('squid\domain_deny.txt'),
];