<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Prime Components Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains configuration options for the Prime Components package.
    | You can customize various aspects of the components behavior here.
    |
    */

    'prefix' => 'aumtics',

    /*
    |--------------------------------------------------------------------------
    | Default Component Settings
    |--------------------------------------------------------------------------
    */
    'defaults' => [
        'table' => [
            'card_id' => '',
        ],
        'dashboard_header' => [
            'page_title' => '',
            'breadcrumb_items' => [],
        ],
        'top_header' => [
            'show_filter' => true,
            'multi_deactivate_btn' => false,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Asset Configuration
    |--------------------------------------------------------------------------
    */
    'assets' => [
        'css' => [
            // Add any default CSS files
        ],
        'js' => [
            // Add any default JS files
        ],
    ],
]; 