<?php

return [
    '__name' => 'site-object-filter',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/site-object-filter.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'https://iqbalfn.com/'
    ],
    '__files' => [
        'modules/site-object-filter' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'SiteObjectFilter\\Controller' => [
                'type' => 'file',
                'base' => 'modules/site-object-filter/controller'
            ],
            'SiteObjectFilter\\Iface' => [
                'type' => 'file',
                'base' => 'modules/site-object-filter/interface'
            ],
            'SiteObjectFilter\\Library' => [
                'type' => 'file',
                'base' => 'modules/site-object-filter/library'
            ]
        ],
        'files' => []
    ],
    'routes' => [
        'site' => [
            'adminObjectFilter' => [
                'path' => [
                    'value' => '/-/object/filter'
                ],
                'method' => 'GET',
                'handler' => 'SiteObjectFilter\\Controller\\Filter::filter'
            ]
        ]
    ],
    'siteObjectFilter' => [
        'filters' => [
            'handlers' => [
                'timezone' => 'SiteObjectFilter\\Library\\TimezoneFilter'
            ]
        ]
    ]
];