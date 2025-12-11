<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tamu - Novotel Karawang</title>
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
        <h1>Daftar Tamu Hotel Novotel Karawang</h1>

        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('tamu.create') }}" class="btn">+ Tambah Tamu Baru</a>
        <a href="{{ route('dashboard') }}" class="btn btn-dashboard">← Kembali ke Dashboard</a>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tamus as $index => $tamu)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $tamu->nama }}</td>
                        <td>{{ $tamu->alamat }}</td>
                        <td>{{ $tamu->telepon }}</td>
                        <td>{{ $tamu->email }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('tamu.edit', $tamu->id) }}" class="btn-sm btn-warning">Edit</a>
                                <form action="{{ route('tamu.destroy', $tamu->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus tamu ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-sm btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align:center;">Belum ada data tamu</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>