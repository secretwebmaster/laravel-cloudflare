<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cloudflare API Token
    |--------------------------------------------------------------------------
    |
    | Your Cloudflare API Token. This is the recommended authentication method.
    | You can create one at: https://dash.cloudflare.com/profile/api-tokens
    |
    | Leave this null if using email + API key authentication instead.
    |
    */

    'api_token' => env('CLOUDFLARE_API_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | Cloudflare Email & API Key
    |--------------------------------------------------------------------------
    |
    | Your Cloudflare account email and global API key.
    | Find your API key at: https://dash.cloudflare.com/profile/api-tokens
    |
    | Only required if not using API Token authentication.
    |
    */

    'email' => env('CLOUDFLARE_EMAIL'),
    'api_key' => env('CLOUDFLARE_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | API Configuration
    |--------------------------------------------------------------------------
    |
    | Configure API connection settings.
    |
    */

    'base_url' => env('CLOUDFLARE_BASE_URL', 'https://api.cloudflare.com/client/v4'),
    'timeout' => env('CLOUDFLARE_TIMEOUT', 30),

];
