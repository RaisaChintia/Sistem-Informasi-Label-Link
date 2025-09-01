<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f2f2; display:flex; justify-content:center; align-items:center; height:100vh; }
        .login-container { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); width: 300px; }
        h2 { text-align: center; margin-bottom: 20px; }
        input { width: 100%; padding: 10px; margin: 5px 0 15px 0; border-radius: 4px; border: 1px solid #ccc; }
        button { width: 100%; padding: 10px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
        .error { color: red; text-align: center; margin-bottom: 10px; }
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
            <label>Email:</label>
            <input type="email" name="email" placeholder="Masukkan email" required>

            <label>Password:</label>
            <input type="password" name="password" placeholder="Masukkan password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
