<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Angsuran;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class AngsuranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nik = Auth::user()->role == 'user' ? Auth::user()->nik : '';
        if(Auth::user()->role != 'user'){
            $angsurans = Angsuran::all();
        }else{
            $angsurans = Angsuran::where('nik',  $nik)->get();
        }
        return view('angsuran.index', compact('angsurans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = Karyawan::all();
        $nik = Auth::user()->role == 'user' ? Auth::user()->nik : '';
        return view('angsuran.create', compact('karyawans','nik'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'jumlah_angsuran' => 'required',
            'tanggal_jatuh_tempo' => 'required|date',
            'tanggal_bayar' => 'required|date',
            'metode_pembayaran' => 'required',
        ]);
        $path = '';
        if($request->file('bukti_pembayaran')){
            $file = $request->file('bukti_pembayaran');
            $path = $file->store('bukti_pembayaran', 'public');
        }
        $angsuran = new Angsuran;
        $angsuran->nik = $request->nik;
        $angsuran->nama = $request->nama;
        $angsuran->jumlah_angsuran = str_replace(',', '', $request->jumlah_angsuran);
        $angsuran->tanggal_jatuh_tempo = $request->tanggal_jatuh_tempo;
        $angsuran->tanggal_bayar = $request->tanggal_bayar;
        $angsuran->metode_pembayaran = $request->metode_pembayaran;
        $angsuran->bukti_pembayaran = $path;
        $angsuran->save();

        return redirect()->route('angsuran.index')->with('success', 'Angsuran berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Angsuran $angsuran)
    {
        return view('angsuran.show', compact('angsuran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Angsuran $angsuran)
    {
        $karyawans = Karyawan::all();
        $nik = Auth::user()->role == 'user' ? Auth::user()->nik : '';
        return view('angsuran.edit', compact('angsuran','karyawans','nik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Angsuran $angsuran)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'jumlah_angsuran' => 'required',
            'tanggal_jatuh_tempo' => 'required|date',
            'tanggal_bayar' => 'required|date',
            'metode_pembayaran' => 'required',
        ]);

        $angsuran->nik = $request->nik;
        $angsuran->nama = $request->nama;
        $angsuran->jumlah_angsuran =str_replace(',', '', $request->jumlah_angsuran);
        $angsuran->tanggal_jatuh_tempo = $request->tanggal_jatuh_tempo;
        $angsuran->tanggal_bayar = $request->tanggal_bayar;
        $angsuran->metode_pembayaran = $request->metode_pembayaran;

        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $path = $file->store('bukti_pembayaran', 'public');
            $angsuran->bukti_pembayaran = $path;
        }

        $angsuran->save();

        return redirect()->route('angsuran.index')->with('success', 'Angsuran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Angsuran $angsuran)
    {
        $angsuran->delete();

        return redirect()->route('angsuran.index')->with('success', 'Angsuran dihapus dengan sukses.');
    }
}
