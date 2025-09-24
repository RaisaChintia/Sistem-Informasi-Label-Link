<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aplikasi Pasien</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #ffffffff, #ffffffff);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: #fff;
            padding: 40px 35px;
            border-radius: 12px;
            box-shadow: 0px 8px 25px rgba(0,0,0,0.15);
            width: 350px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 25px;
            color: #333;
            font-weight: 600;
        }

        .login-container label {
            display: block;
            text-align: left;
            font-size: 14px;
            margin-bottom: 5px;
            color: #555;
        }

        .login-container input {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 15px;
            box-sizing: border-box;
            transition: 0.3s;
        }

        .login-container input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0,123,255,0.4);
        }

        .login-container button {
            width: 100%;
            padding: 12px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-container button:hover {
            background: #0056b3;
        }

        .error {
            color: #d9534f;
            background: #f9d6d5;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .footer {
            margin-top: 20px;
            font-size: 13px;
            color: #777;
        }

    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ url('/login') }}">
            @csrf
            <label>Username</label>
            <input type="text" name="username" placeholder="Masukkan username" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>

            <button type="submit">Masuk</button>
        </form>

        <div class="footer">
            © 2025 SiBel-Lab | Sistem Label Pasien
        </div>
    </div>
</body>
</html>
