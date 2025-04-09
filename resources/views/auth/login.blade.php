<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - HandyGear Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/loginstyle.css') }}">
</head>
<body class="login-body">
<div class="login-container">
    <div class="logo-container">
        <img src="{{ asset('logo/logo.png') }}" alt="HandyGear Logo" class="logo">
    </div>
    <div class="login-right">
        <h1 class="text-orange">HandyGear</h1>
        <h2 class="text-light">Inventory</h2>

        @if(session('admin_active'))
            <div class="alert alert-warning">{{ session('admin_active') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf
            <input type="text" name="username" placeholder="Username" class="form-control mb-3" required>
            <input type="password" name="password" placeholder="Password" class="form-control mb-3" required>
            <button type="submit" class="btn btn-orange w-100">Login</button>
        </form>
    </div>
</div>
</body>
</html>
