<?php
// 设置响应头
header('Content-Type: text/html; charset=utf-8');

// 3. 连接数据库
$mysqli = new mysqli("localhost", "root", "286899", "music");
if ($mysqli->connect_error) {
    die("<script>alert('数据库连接失败');history.back();</script>");
}
// 1. 接收数据
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

// 2. 验证输入
if (empty($username) || empty($password)) {
    die("<script>alert('用户名、密码不能为空');history.back();</script>");
}
if(isset($_POST["login"])){
    $sql = "SELECT username, password FROM users WHERE username='$username'";
    $res = $mysqli->query($sql)->fetch_assoc();
    if($res){
        if(password_verify($password, $res['password'])){
            echo "<script>window.location.href='拾贝集.html?uname=$username';</script>";
        }else{
            echo "<script>alert('密码输入有误！！');history.go(-1);</script>')";
        }

    }else{
        echo "<script>alert('用户不存在！！');history.go(-1);</script>')";
    }
}