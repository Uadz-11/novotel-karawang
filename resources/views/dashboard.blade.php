<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Novotel Karawang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Novotel Karawang</a>

        <div class="d-flex">
            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-warning">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h3>Selamat Datang, {{ Auth::user()->name }}</h3>
    <p>Role: <strong>{{ Auth::user()->role }}</strong></p>

    <div class="card mt-4">
        <div class="card-header bg-dark text-white">
            Menu Utama
        </div>
        <div class="card-body">
            @if(Auth::user()->role == 'admin')
                <a href="{{ url('/admin/kamar') }}" class="btn btn-primary w-100 mb-2">🏨 Kamar</a>
                <a href="{{ url('/admin/tamu') }}" class="btn btn-success w-100 mb-2">🧍 Tamu</a>
                <a href="{{ url('/admin/reservasi') }}" class="btn btn-info w-100 mb-2">📅 Reservasi</a>
            @elseif(Auth::user()->role == 'resepsionis')
                <a href="{{ url('/reservasi') }}" class="btn btn-info w-100 mb-2">📅 Reservasi</a>
            @endif
        </div>
    </div>
</div>

</body>
</html>