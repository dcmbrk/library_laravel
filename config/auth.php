<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |------------------------------------------------------------------------a--
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Mỗi guard tương ứng với một kiểu đăng nhập (user, admin, editor, v.v.)
    | Mặc định Laravel dùng 'web'. Ta thêm 'admin' riêng để tách session.
    |
    */

    'guards' => [
        // Người dùng bình thường
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // Quản trị viên
        'admin' => [
            'driver' => 'session',
            'provider' => 'users', // dùng chung model User
        ],

        // (Tuỳ chọn) Editor — có thể thêm sau nếu cần
        // 'editor' => [
        //     'driver' => 'session',
        //     'provider' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Cả admin và user đều dùng chung bảng users (model App\Models\User)
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
