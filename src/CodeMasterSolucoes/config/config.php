<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Background Colors
    |--------------------------------------------------------------------------
    |
    | Default Background Colors for flash notification based on classes of materialize css.
    |
    */

    'colors' => [
        'info'    => [
            'message'   => [
                'background' => 'blue darken-2 font-weight-bold',
                'text'       =>  'white-text'
            ],
            'button' => [
                'background' => 'blue darken-2',
                'text'       => 'yellow-text'
            ],
        ],
        'success' => [
            'message' => [
                'background' => 'green',
                'text'       => 'white-text font-weight-bold'
            ],
            'button'  => [
                'background' => 'green',
                'text'       => 'white-text'
            ],
        ],
        'warning' => [
            'message' => [
                'background' => 'yellow darken-3',
                'text'       => 'black-text font-weight-bold'
            ],
            'button'  => [
                'background' => 'yellow darken-3',
                'text'       => 'red-text'
            ],
        ],
        'error'   => [
            'message' => [
                'background' => 'red',
                'text'       => 'white-text font-weight-bold'
            ],
            'button'  => [
                'background' => 'red',
                'text'       => 'white-text'
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Views Path
    |--------------------------------------------------------------------------
    |
    | Default views path, case publish provider.
    |
    */

    'views_path' => base_path('resources/views/vendor/flash-materialize'),
];