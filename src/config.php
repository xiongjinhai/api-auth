<?php

use App\Http\Middleware\ApiAuth;

return [
    'status' => 'on', // 状态，on 或者 off

    'roles' => [
//        '{access_key}' => [
//            'name' => '{role_name}',        // 角色名字，例如 android
//            'secret_key' => '{secret_key}',
//        ],
    ],

    'timeout' => 60, // 签名失效时间，单位: 秒

    'encrypting' => [ApiAuth::class, 'encrypting'], // 自定义签名方法

    'rule' => [ApiAuth::class, 'rule'], // 判断签名正确的规则，默认是相等

    'error_handler' => [ApiAuth::class, 'error_handler'], // 签名错误处理方法。
];