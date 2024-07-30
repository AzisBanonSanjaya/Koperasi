<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class TabunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tabungans = Tabungan::all();
        return view('tabungan.index', compact('tabungans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = Karyawan::all();
        return view('tabungan.create', compact('karyawans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tabungan = new Tabungan;
        $tabungan->jenis_transaksi = $request->jenis_transaksi;
        $tabungan->jumlah_transaksi = $request->jumlah_transaksi;
        $tabungan->tanggal_transaksi = $request->tanggal_transaksi;
        $tabungan->saldo = $request->saldo;
        $tabungan->save();
        return redirect()->route('tabungan.index')->with('success', 'tabungan created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Tabungan $tabungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tabungan $tabungan)
    {
        return view('tabungan.edit', compact('tabungan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tabungan $tabungan)
    {
        $tabungan->nik = $request->nik;
        $tabungan->nama = $request->nama;
        $tabungan->jenis_transaksi = $request->jenis_transaksi;
        $tabungan->jumlah_transaksi = $request->jumlah_transaksi;
        $tabungan->tanggal_transaksi = $request->tanggal_transaksi;
        $tabungan->saldo = $request->saldo;
        $tabungan->save();
        return redirect()->route('tabungan.index')->with('success', 'tabungan created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tabungan $tabungan)
    {
        $tabungan->delete();

        return redirect()->route('tabungan.index')->with('success', 'tabungan deleted successfully');
    }
}
