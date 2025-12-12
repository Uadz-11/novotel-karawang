<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Reservasi - Novotel Karawang</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #e6eaf3 0%, #f8fafc 100%);
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 4px 16px rgba(0,53,128,0.07);
        }
        .header-novotel {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 20px;
        }
        .novotel-logo {
            height: 48px;
        }
        h1 {
            color: #003580;
            font-weight: bold;
            margin-bottom: 0;
            text-align: left;
        }
        .stars {
            margin-left: 10px;
            display: flex;
            align-items: center;
        }
        .stars svg {
            width: 18px; height: 18px; margin-right: 2px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #003580;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        input:focus, select:focus {
            outline: none;
            border-color: #003580;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #003580;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            border: none;
            font-weight: 600;
            transition: background 0.2s;
        }
        .btn:hover {
            background: #00214d;
        }
        .btn-cancel {
            background: #6c757d;
            text-decoration: none;
            display: inline-block;
            padding: 10px 20px;
            border-radius: 10px;
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
        <div class="header-novotel">
            <img src="/build/assets/novotel-logo.svg" alt="Novotel Karawang Logo" class="novotel-logo">
            <h1>Tambah Reservasi</h1>
            <span class="stars">
                <svg viewBox="0 0 24 24" fill="#FFD700" xmlns="http://www.w3.org/2000/svg"><polygon points="12,2 15,9 22,9.3 17,14.1 18.5,21 12,17.5 5.5,21 7,14.1 2,9.3 9,9"/></svg>
                <svg viewBox="0 0 24 24" fill="#FFD700" xmlns="http://www.w3.org/2000/svg"><polygon points="12,2 15,9 22,9.3 17,14.1 18.5,21 12,17.5 5.5,21 7,14.1 2,9.3 9,9"/></svg>
                <svg viewBox="0 0 24 24" fill="#FFD700" xmlns="http://www.w3.org/2000/svg"><polygon points="12,2 15,9 22,9.3 17,14.1 18.5,21 12,17.5 5.5,21 7,14.1 2,9.3 9,9"/></svg>
                <svg viewBox="0 0 24 24" fill="#FFD700" xmlns="http://www.w3.org/2000/svg"><polygon points="12,2 15,9 22,9.3 17,14.1 18.5,21 12,17.5 5.5,21 7,14.1 2,9.3 9,9"/></svg>
            </span>
        </div>

        <form action="{{ route('reservasi.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="tamu_id">Pilih Tamu</label>
                <select name="tamu_id" required>
    <option value="">-- Pilih Tamu --</option>
    @foreach($tamus as $tamu)
        <option value="{{ $tamu->id }}">{{ $tamu->nama }}</option> <!-- value = ID -->
    @endforeach
</select>
            </div>

            <div class="form-group">
                <label for="kamar_id">Pilih Kamar</label>
                <select id="kamar_id" name="kamar_id" required>
                    <option value="">-- Pilih Kamar --</option>
                    @foreach($kamars as $kamar)
                        <option value="{{ $kamar->id }}" {{ $kamar->status == 'terisi' ? 'disabled' : '' }}>
                            {{ $kamar->nomor_kamar }} ({{ $kamar->tipe_kamar }}, Rp {{ number_format($kamar->harga, 0, ',', '.') }})
                            @if($kamar->status == 'terisi')
                                – Terisi
                            @endif
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="check_in">Check In</label>
                <input type="date" id="check_in" name="check_in" required>
            </div>

            <div class="form-group">
                <label for="check_out">Check Out</label>
                <input type="date" id="check_out" name="check_out" required>
            </div>

            <div class="actions">
                <button type="submit" class="btn">Simpan</button>
                <a href="{{ route('reservasi.index') }}" class="btn-cancel">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>