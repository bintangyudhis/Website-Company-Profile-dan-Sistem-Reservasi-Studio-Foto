<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Sejenak Studio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; display: flex; align-items: center; justify-content: center; height: 100vh; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .login-card { width: 100%; max-width: 400px; padding: 20px; border-radius: 15px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1); background-color: white; }
    </style>
</head>
<body>
    <div class="login-card p-5">
        <div class="text-center mb-4">
            <h3 class="fw-bold">SEJENAK <span class="text-primary">STUDIO</span></h3>
            <p class="text-muted small">Admin Dashboard Login</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger small">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label text-secondary small fw-bold">Email Address</label>
                <input type="email" name="email" class="form-control mb-2" placeholder="admin@sejenak.com" required autofocus>
            </div>
            <div class="mb-4">
                <label class="form-label text-secondary small fw-bold">Password</label>
                <input type="password" name="password" class="form-control mb-2" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Sign In</button>
        </form>
    </div>
</body>
</html>
