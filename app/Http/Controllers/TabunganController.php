<?php

namespace App\Http\Controllers;

use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Tabungan;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class TabunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterNik = $request->filter_user;
        $nik = Auth::user()->role == 'user' ? Auth::user()->nik : '';
        if(empty($filterNik)){
            if(Auth::user()->role != 'user'){
                $tabungans = Tabungan::all();
            }else{
                $tabungans = Tabungan::where('nik',  $nik)->get();
            }
        }else{
            $tabungans = Tabungan::where('nik',  $filterNik)->get();
        }
        $karyawans = Karyawan::all();
        return view('tabungan.index', compact('tabungans','karyawans','filterNik'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = Karyawan::all();
        $nik = Auth::user()->role == 'user' ? Auth::user()->nik : '';
        return view('tabungan.create', compact('karyawans','nik'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tabungan = new Tabungan;
        $tabungan->nik = $request->nik;
        $tabungan->nama = $request->nama;
        $tabungan->jenis_transaksi = $request->jenis_transaksi;
        $tabungan->jumlah_transaksi = str_replace(',', '', $request->jumlah_transaksi);
        $tabungan->tanggal_transaksi = $request->tanggal_transaksi;
        $tabungan->saldo = str_replace(',', '', $request->saldo);
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
        $karyawans = Karyawan::all();
        $nik = Auth::user()->role == 'user' ? Auth::user()->nik : '';
        return view('tabungan.edit', compact('tabungan','karyawans','nik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tabungan $tabungan)
    {
        $tabungan->nik = $request->nik;
        $tabungan->nama = $request->nama;
        $tabungan->jenis_transaksi = $request->jenis_transaksi;
        $tabungan->jumlah_transaksi = str_replace(',', '', $request->jumlah_transaksi);
        $tabungan->tanggal_transaksi = $request->tanggal_transaksi;
        $tabungan->saldo = str_replace(',', '', $request->saldo);
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

    public function exportPDF(Request $request)
    {
        $filterNik = $request->filter_user;
        $nik = Auth::user()->role == 'user' ? Auth::user()->nik : '';
        if(empty($filterNik)){
            if(Auth::user()->role != 'user'){
                $tabungans = Tabungan::all();
            }else{
                $tabungans = Tabungan::where('nik',  $nik)->get();
            }
        }else{
            $tabungans = Tabungan::where('nik',  $filterNik)->get();
        }
        
        $data = ['tabungans' => $tabungans];
        $pdf = Pdf::loadView('tabungan.exportPdf', $data);
        return $pdf->download('tabungan.pdf');
    }
}
