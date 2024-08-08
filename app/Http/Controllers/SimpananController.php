<?php

namespace App\Http\Controllers;

use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Karyawan;
use App\Models\Simpanan;
use Illuminate\Http\Request;

class SimpananController extends Controller
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
                $simpanans = Simpanan::all();
            }else{
                $simpanans = Simpanan::where('nik',  $nik)->get();
            }
        }else{
            $simpanans = Simpanan::where('nik',  $filterNik)->get();
        }
        $karyawans = Karyawan::all();
        return view('simpanan.index', compact('simpanans','karyawans','filterNik'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = Karyawan::all();
        $nik = Auth::user()->role == 'user' ? Auth::user()->nik : '';
        return view('simpanan.create', compact('karyawans','nik'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string',
            'nama' => 'required|string',
            'jenis_simpanan' => 'required|string',
            'jumlah' => 'required',
            'keterangan' => 'required|string',
            'tanggal_simpanan' => 'required|date',
        ]);
        $simpanan = new Simpanan;
        $simpanan->nik = $request->nik;
        $simpanan->nama = $request->nama;
        $simpanan->jenis_simpanan = $request->jenis_simpanan;
        $simpanan->jumlah = str_replace(',','',$request->jumlah);
        $simpanan->keterangan = $request->keterangan;
        $simpanan->tanggal_simpanan = $request->tanggal_simpanan;
        $simpanan->save();

        return redirect()->route('simpanan.index')->with('success', 'Simpanan created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Simpanan $simpanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Simpanan $simpanan)
    {
        $karyawans = Karyawan::all();
        $nik = Auth::user()->role == 'user' ? Auth::user()->nik : '';
        return view('simpanan.edit', compact('simpanan','karyawans','nik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Simpanan $simpanan)
    {
        $request->validate([
            'nik' => 'required|string',
            'nama' => 'required|string',
            'jenis_simpanan' => 'required|string',
            'jumlah' => 'required|numeric',
            'keterangan' => 'required|string',
            'tanggal_simpanan' => 'required|date',
        ]);

        $simpanan->nik = $request->nik;
        $simpanan->nama = $request->nama;
        $simpanan->jenis_simpanan = $request->jenis_simpanan;
        $simpanan->jumlah = $request->jumlah;
        $simpanan->keterangan = $request->keterangan;
        $simpanan->tanggal_simpanan = $request->tanggal_simpanan;
        $simpanan->save();

        return redirect()->route('simpanan.index')->with('success', 'Simpanan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Simpanan $simpanan)
    {
        $simpanan->delete();

        return redirect()->route('simpanan.index')->with('success', 'Simpanan deleted successfully');
    }

    public function exportPDF(Request $request)
    {
        $filterNik = $request->filter_user;
        if(Auth::user()->role == 'user'){
            $simpanans = Simpanan::where('nik', Auth::user()->nik)->get();
        }else{
            $simpanans = Simpanan::all();
        }
        $data = ['simpanans' => $simpanans];
        $pdf = Pdf::loadView('simpanan.exportPdf', $data);
        return $pdf->download('simpanan.pdf');
    }
}
