<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Acl' => $baseDir . '/vendor/cakephp/acl/',
        'AclManager' => $baseDir . '/vendor/ivanamat/cakephp3-aclmanager/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'BootstrapUI' => $baseDir . '/vendor/friendsofcake/bootstrap-ui/',
        'CakePdf' => $baseDir . '/vendor/friendsofcake/cakepdf/',
        'Captcha' => $baseDir . '/vendor/dereuromark/cakephp-captcha/',
        'Crud' => $baseDir . '/vendor/friendsofcake/crud/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Josegonzalez/Upload' => $baseDir . '/vendor/josegonzalez/cakephp-upload/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'Queue' => $baseDir . '/vendor/dereuromark/cakephp-queue/',
        'Search' => $baseDir . '/vendor/friendsofcake/search/',
        'SoftDelete' => $baseDir . '/vendor/pgbi/cakephp3-soft-delete/'
    ]
];