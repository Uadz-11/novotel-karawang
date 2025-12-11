<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservasi - Novotel Karawang</title>
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
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            border: none;
        }
        .btn:hover {
            background: #0056b3;
        }
        .btn-cancel {
            background: #6c757d;
            text-decoration: none;
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            margin-left: 10px;
        }
        .btn-cancel:hover {
            background: #5a6268;
        }
        .actions {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Reservasi</h1>

        <form action="{{ route('reservasi.update', $reservasi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="tamu_id">Pilih Tamu</label>
                <select id="tamu_id" name="tamu_id" required>
                    <option value="">-- Pilih Tamu --</option>
                    @foreach($tamus as $tamu)
                        <option value="{{ $tamu->id }}" {{ old('tamu_id', $reservasi->tamu_id) == $tamu->id ? 'selected' : '' }}>
                            {{ $tamu->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="kamar_id">Pilih Kamar</label>
                <select id="kamar_id" name="kamar_id" required>
                    <option value="">-- Pilih Kamar --</option>
                    @foreach($kamars as $kamar)
                        <option value="{{ $kamar->id }}" 
                                {{ old('kamar_id', $reservasi->kamar_id) == $kamar->id ? 'selected' : '' }}
                                {{ $kamar->status == 'terisi' && $kamar->id != $reservasi->kamar_id ? 'disabled' : '' }}>
                            {{ $kamar->nomor_kamar }} ({{ $kamar->tipe_kamar }}, Rp {{ number_format($kamar->harga, 0, ',', '.') }})
                            @if($kamar->status == 'terisi' && $kamar->id != $reservasi->kamar_id)
                                – Terisi
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="check_in">Check In</label>
                <input type="date" 
                       id="check_in" 
                       name="check_in" 
                       value="{{ old('check_in', \Carbon\Carbon::parse($reservasi->check_in)->format('Y-m-d')) }}" 
                       required>
            </div>

            <div class="form-group">
                <label for="check_out">Check Out</label>
                <input type="date" 
                       id="check_out" 
                       name="check_out" 
                       value="{{ old('check_out', \Carbon\Carbon::parse($reservasi->check_out)->format('Y-m-d')) }}" 
                       required>
            </div>

            <div class="actions">
                <button type="submit" class="btn">Perbarui</button>
                <a href="{{ route('reservasi.index') }}" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>