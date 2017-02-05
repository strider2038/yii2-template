<?php

$localCommon = [
    'components' => [
        'db' => [
        ],
        'mailer' => [
            'useFileTransport' => true,
        ],
    ],
];

$localConsole = [];

$localWeb = [
    'components' => [
        'request' => [
            'cookieValidationKey' => '',
        ],
        'session' => [
            'cookieParams' => [
                'domain' => '',
            ],
        ],
    ],
];

return array_merge_recursive($localCommon, YII_CONSOLE ? $localConsole : $localWeb);