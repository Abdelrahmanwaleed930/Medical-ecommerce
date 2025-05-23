<!DOCTYPE html>
<html>
<head>
    <title>Medical E-Commerce</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Medical E-Commerce</a>
        <a class="btn btn-outline-primary" href="{{ route('cart.index') }}">Cart</a>
        @auth
            <a class="btn btn-outline-secondary" href="{{ route('admin.products.index') }}">Admin Panel</a>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button class="btn btn-outline-danger">Logout</button>
            </form>
        @else
            <a class="btn btn-outline-success" href="{{ route('login') }}">Login</a>
        @endauth
    </div>
</nav>
<div class="container">
    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif
    @yield('content')
</div>
</body>
</html>