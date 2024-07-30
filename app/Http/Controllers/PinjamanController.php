<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    // Menampilkan daftar pinjaman
    public function index()
    {
        $pinjamans = Pinjaman::all();
        return view('pinjaman.index', compact('pinjamans'));
    }

    // Menampilkan form untuk membuat pinjaman baru
    public function create()
    {
        return view('pinjaman.create');
    }

    // Menyimpan data pinjaman baru
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'jumlah_pinjaman' => 'required|numeric',
            'tanggal_pinjam' => 'required|date',
            'jangka_waktu' => 'required|string',
            'estimasi' => 'required|integer',
            'bunga_persen' => 'required|numeric',
            'total_bunga' => 'required|numeric',
            'total_angsuran' => 'required|numeric',
        ]);

        // Buat instance baru dari model Pinjaman
        $pinjaman = new Pinjaman($validatedData);
        $pinjaman->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pinjaman.index')->with('success', 'Pinjaman berhasil dibuat.');
    }

    // Menampilkan form untuk mengedit pinjaman
    public function edit($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        return view('pinjaman.edit', compact('pinjaman'));
    }

    // Memperbarui data pinjaman
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'jumlah_pinjaman' => 'required|numeric',
            'tanggal_pinjam' => 'required|date',
            'jangka_waktu' => 'required|string',
            'estimasi' => 'required|integer',
            'bunga_persen' => 'required|numeric',
            'total_bunga' => 'required|numeric',
            'total_angsuran' => 'required|numeric',
        ]);

        // Temukan pinjaman berdasarkan ID dan perbarui
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->update($validatedData);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pinjaman.index')->with('success', 'Pinjaman berhasil diperbarui.');
    }

    // Menghapus data pinjaman
    public function destroy($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pinjaman.index')->with('success', 'Pinjaman berhasil dihapus.');
    }
}
