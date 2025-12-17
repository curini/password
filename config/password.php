<?php

return [
    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => env('GITHUB_CLIENT_CALLBACK')
    ],
    'socialite_redirect' => [
        'success' => env('APP_SOCIALITE_REDIRECT_SUCCESS', '/dashboard'),
        'error' => env('APP_SOCIALITE_REDIRECT_ERROR', '/'),
    ],
];
