<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Resepsionis - Novotel Karawang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <span class="navbar-brand">Resepsionis - Novotel Karawang</span>

        <form action="{{ route('resepsionis.logout') }}" method="POST">
            @csrf
            <button class="btn btn-light">Logout</button>
        </form>
    </div>
</nav>

<div class="container mt-4">
    <h3>Halo {{ Auth::user()->name }}</h3>
    <p>Role: <strong>{{ Auth::user()->role }}</strong></p>

    <div class="card mt-3">
        <div class="card-header bg-dark text-white">
            Menu Resepsionis
        </div>
        <div class="card-body">
            <a href="{{ route('reservasi.index') }}" class="btn btn-info w-100 mb-2">🔹 Kelola Reservasi</a>
            <a href="{{ route('tamu.index') }}" class="btn btn-success w-100 mb-2">🔹 Kelola Tamu</a>
            <a href="{{ route('kamar.index') }}" class="btn btn-primary w-100 mb-2">🔹 Cek Status Kamar</a>
        </div>
    </div>
</div>

</body>
</html>
