<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Reservasi - Novotel Karawang</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
            margin-right: 10px;
        }
        .btn:hover {
            background: #0056b3;
        }
        .btn-dashboard {
            background: #6c757d;
        }
        .btn-dashboard:hover {
            background: #5a6268;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #007bff;
            color: white;
        }
        tr:hover {
            background: #f5f5f5;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
        .btn-sm {
            padding: 5px 10px;
            font-size: 14px;
            text-decoration: none;
            border-radius: 3px;
            border: none;
            cursor: pointer;
            display: inline-block;
            text-align: center;
        }
        .btn-warning {
            background: #ffc107;
            color: #333;
        }
        .btn-danger {
            background: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Reservasi Hotel Novotel Karawang</h1>

        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('reservasi.create') }}" class="btn">+ Tambah Reservasi</a>
        <a href="{{ route('dashboard') }}" class="btn btn-dashboard">← Kembali ke Dashboard</a>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tamu</th>
                    <th>Kamar</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reservasi as $index => $r)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $r->tamu->nama ?? '–' }}</td>
                        <td>{{ $r->kamar->nomor_kamar ?? '–' }}</td>
                        <td>{{ \Carbon\Carbon::parse($r->check_in)->format('d M Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($r->check_out)->format('d M Y') }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('reservasi.edit', $r->id) }}" class="btn-sm btn-warning">Edit</a>
                                <form action="{{ route('reservasi.destroy', $r->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus reservasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center;">Belum ada data reservasi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>