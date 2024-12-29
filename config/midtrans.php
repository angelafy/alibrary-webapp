<?php

return [
    'merchant_id' => env('MIDTRANS_MERCHANT_ID', 'G117952955'),
    'client_key' => env('MIDTRANS_CLIENT_KEY', 'SB-Mid-client-7P5mXHtlZS17kMxg'),
    'server_key' => env('MIDTRANS_SERVER_KEY', 'SB-Mid-server-32GuoRuJNv-7Dto4awpnL7Ix'),
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
    'is_sanitized' => true,
    'is_3ds' => true
];