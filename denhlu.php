<?php
require_once'vendor/autoload.php';

use Supabase\Client;

// 配置 Supabase 项目信息
$supabaseUrl = 'YOUR_SUPABASE_URL';
$supabaseKey = 'YOUR_ANON_KEY';
$client = new Client($supabaseUrl, $supabaseKey);

// 模拟注册信息
$registrationData = [
    'username' => 'john_doe',
    'email' => 'john@example.com',
    'password' => password_hash('password123', PASSWORD_DEFAULT)
];

try {
    // 插入数据到 users 表
    $response = $client->from('users')->insert([$registrationData]);
    if ($response->statusCode === 201) {
        echo '注册信息已成功保存到 Supabase！';
    } else {
        echo '保存注册信息时出现错误：'.$response->getBody();
    }
} catch (Exception $e) {
    echo '发生异常：'.$e->getMessage();
}