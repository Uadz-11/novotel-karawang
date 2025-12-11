<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Novotel Karawang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Novotel Karawang - Admin</a>

        <div>
            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-warning">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container mt-4">

    <h3>Selamat Datang, {{ Auth::user()->name }}!</h3>
    <p>Role: <strong>{{ Auth::user()->role }}</strong></p>

    <div class="card mt-4">
        <div class="card-header bg-dark text-white">
            Menu Utama Admin
        </div>
        <div class="card-body">

            <a href="{{ route('kamar.index') }}" class="btn btn-primary w-100 mb-2">🔹 CRUD Kamar</a>
            <a href="{{ route('tamu.index') }}" class="btn btn-success w-100 mb-2">🔹 CRUD Tamu</a>
            <a href="{{ route('reservasi.index') }}" class="btn btn-info w-100 mb-2">🔹 CRUD Reservasi</a>

        </div>
    </div>

</div>

</body>
</html>
