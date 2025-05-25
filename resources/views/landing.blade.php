<!-- filepath: resources/views/landing.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Todo App - Landing Page</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f4f4;
        color: #333;
        text-align: center;
        padding: 50px;
    }

    h1 {
        font-size: 36px;
        margin-bottom: 20px;
    }

    .btn-container {
        margin-top: 30px;
    }

    .btn {
        text-decoration: none;
        background-color: #333;
        color: #fff;
        padding: 12px 25px;
        margin: 0 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #555;
    }
    </style>
</head>

<body>
    <h1>Selamat Datang di Todo App!</h1>
    <p>Aplikasi sederhana untuk mencatat dan mengelola tugas harianmu.</p>

    <div class="btn-container">
        <a href="{{ route('login') }}" class="btn">Login</a>
        <a href="{{ route('register') }}" class="btn">Register</a>
    </div>
</body>

</html>