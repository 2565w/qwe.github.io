<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>单词拾贝集 - 登录与注册</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: url('https://picsum.photos/1920/1080') no-repeat center/cover;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .glass-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 32px;
            width: 90%;
            max-width: 400px;
        }

        .input-field {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            transition: all 0.3s ease;
        }

        .input-field:focus {
            outline: none;
            border-color: white;
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.2);
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
<!-- 登录界面 -->
<div id="login-page" class="glass-container">
    <h2 class="text-2xl font-bold text-white text-center mb-8">登录</h2>
    <form action="./login.php" method="post">
        <div class="mb-4">
            <!-- 添加 name="username" -->
            <input type="text" id="login-username" name="username" class="input-field w-full p-3 rounded-md" placeholder="用户名">
        </div>
        <div class="mb-4">
            <!-- 添加 name="password" -->
            <input type="password" id="login-password" name="password" class="input-field w-full p-3 rounded-md" placeholder="密码">
        </div>
        <div class="mb-4">
            <button type="submit" name="login" class="btn bg-white text-blue-600 w-full p-3 rounded-md font-bold">登录</button>
        </div>
    </form>
    <p class="text-white text-center mt-4">
        没有账号？<a href="#" onclick="showRegisterPage()" class="text-blue-300 hover:underline">注册账号</a>
    </p>
</div>

<!-- 注册界面 -->
<div id="register-page" class="glass-container hidden">
    <h2 class="text-2xl font-bold text-white text-center mb-8">注册</h2>
    <!-- 修改注册表单，移除重复的提交按钮 -->
    <form action="denhlu.php" method="post">
        <div class="mb-4">
            <input type="text" name="username" id="register-username" class="input-field w-full p-3 rounded-md" placeholder="用户名" required>
        </div>
        <div class="mb-4">
            <input type="password" name="password" id="register-password" class="input-field w-full p-3 rounded-md" placeholder="密码" required minlength="8">
        </div>
        <div class="mb-4">
            <input type="password" name="confirm_password" id="register-confirm-password" class="input-field w-full p-3 rounded-md" placeholder="确认密码" required minlength="8">
        </div>
        <button type="submit" name="reg" class="btn bg-white text-blue-600 w-full p-3 rounded-md font-bold">注册</button>
    </form>
    <p class="text-white text-center mt-4">
        已有账号？<a href="#" onclick="showLoginPage()" class="text-blue-300 hover:underline">登录</a>
    </p>
</div>

    <script>
        function showRegisterPage() {
            document.getElementById('login-page').classList.add('hidden');
            document.getElementById('register-page').classList.remove('hidden');
        }

        function showLoginPage() {
            document.getElementById('register-page').classList.add('hidden');
            document.getElementById('login-page').classList.remove('hidden');
        }

        document.getElementById('login-form').addEventListener('submit', function (e) {
            e.preventDefault();
            // 这里可以添加实际的登录验证逻辑
            // 现在简单模拟登录成功
            alert('登录成功！');
            // 跳转至拾贝集界面
            window.location.href = '拾贝集.html';
        });

        document.getElementById('register-form').addEventListener('submit', function (e) {
            e.preventDefault();
            const password = document.getElementById('register-password').value;
            const confirmPassword = document.getElementById('register-confirm-password').value;
            if (password === confirmPassword) {
                // 这里可以添加注册逻辑
                alert('注册成功！');
                showLoginPage();
            } else {
                alert('两次输入的密码不一致，请重新输入。');
            }
        });
    </script>
</body>

</html>
