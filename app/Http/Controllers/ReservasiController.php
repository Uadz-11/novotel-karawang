<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Tamu;
use App\Models\Kamar;

class ReservasiController extends Controller
{
    public function __construct()
    {
        // Hanya user dengan role admin atau resepsionis yang bisa akses
        $this->middleware('auth');
        $this->middleware('role:admin,resepsionis');
    }

    public function index()
{
    return view('reservasi.index');
}
    public function create()
    {
        $tamuList = Tamu::all();
        $kamarList = Kamar::where('status', 'tersedia')->get();
        return view('reservasi.create', compact('tamuList', 'kamarList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tamu_id' => 'required|exists:tamus,id',
            'kamar_id' => 'required|exists:kamars,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        // misalnya total bayar dihitung berdasarkan harga kamar × lama menginap
        $kamar = Kamar::find($request->kamar_id);
        $lama = \Carbon\Carbon::parse($request->check_out)
                 ->diffInDays(\Carbon\Carbon::parse($request->check_in));
        $total = $kamar->harga * $lama;

        Reservasi::create([
            'tamu_id' => $request->tamu_id,
            'kamar_id' => $request->kamar_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total_bayar' => $total,
        ]);

        // optional: ubah status kamar ke "terisi"
        $kamar->status = 'terisi';
        $kamar->save();

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil ditambahkan');
    }

    public function show(Reservasi $reservasi)
    {
        return view('reservasi.show', compact('reservasi'));
    }

    public function edit(Reservasi $reservasi)
    {
        $tamuList = Tamu::all();
        $kamarList = Kamar::all();
        return view('reservasi.edit', compact('reservasi','tamuList','kamarList'));
    }

    public function update(Request $request, Reservasi $reservasi)
    {
        $request->validate([
            'tamu_id' => 'required|exists:tamus,id',
            'kamar_id' => 'required|exists:kamars,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        $kamar = Kamar::find($request->kamar_id);
        $lama = \Carbon\Carbon::parse($request->check_out)
                 ->diffInDays(\Carbon\Carbon::parse($request->check_in));
        $total = $kamar->harga * $lama;

        $reservasi->update([
            'tamu_id' => $request->tamu_id,
            'kamar_id' => $request->kamar_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total_bayar' => $total,
        ]);

        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil diperbarui');
    }

    public function destroy(Reservasi $reservasi)
    {
        // optional: kembalikan status kamar ke tersedia
        $kamar = $reservasi->kamar;
        $kamar->status = 'tersedia';
        $kamar->save();

        $reservasi->delete();
        return redirect()->route('reservasi.index')->with('success', 'Reservasi berhasil dihapus');
    }
}
