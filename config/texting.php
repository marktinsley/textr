<?php

return [
    'driver' => env('TEXTING_DRIVER', 'twilio'),

    'services' => [
        'twilio' => [
            'account_sid' => env('TWILIO_ACCOUNT_SID'),
            'auth_token' => env('TWILIO_AUTH_TOKEN'),
            'from_number' => env('TWILIO_FROM_NUMBER'),
        ]
    ]
];
