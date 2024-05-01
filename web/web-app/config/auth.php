<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'eusers', // Change 'users' to 'eusers'
        ],
    ],

    'providers' => [
        'eusers' => [ // Change 'users' to 'eusers'
            'driver' => 'eloquent',
            'model' => App\Models\Euser::class, // Update this line to point to your Euser model
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
