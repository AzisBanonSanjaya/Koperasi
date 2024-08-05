<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Karyawan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Departemen;
use App\Models\Jabatan;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        $departemen = Departemen::all();
        return view('karyawan.index', compact('karyawan', 'departemen'));
        
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
        $departemen = Departemen::all();
        $jabatan = Jabatan::all();
        return view('karyawan.create', compact('departemen', 'jabatan'));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:karyawans|digits:16',
            'name' => 'required|unique:karyawans|string|max:100',
            'departemen' => 'required',
            'jabatan' => 'required',
            'tanggal_bergabung' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'email' => 'required',
        ]);  

        $karyawan = new Karyawan;
        $karyawan->nik = $request->nik;
        $karyawan->name = $request->name;
        $karyawan->departemen_id = $request->departemen;
        $karyawan->jabatan_id = $request->jabatan;
        $karyawan->tanggal_bergabung = $request->tanggal_bergabung;
        $karyawan->alamat = $request->alamat;
        $karyawan->no_telepon = $request->no_telepon;
        $karyawan->email = $request->email;
        $karyawan->status_keanggotaan = 'aktif';
        $karyawan->password = bcrypt($request->password);
        $karyawan->expired = Carbon::parse($request->tanggal_bergabung)->addYear(1);
        $karyawan->save();
        return redirect()->route('karyawan.index')->with('success', 'Karyawan deleted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($nik)
{
    $karyawan = Karyawan::where('nik', $nik)->first();
    if (!$karyawan) {
        return redirect()->back()->with('error', 'Karyawan not found');
    }

    $departemen = $karyawan->departemen; // Menggunakan relasi

    return view('karyawan.show', compact('karyawan', 'departemen'));
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $karyawan = Karyawan::findOrFail($id);
    $departemen = Departemen::all();
    $jabatan = Jabatan::all();
    return view('karyawan.edit', compact('karyawan','departemen', 'jabatan'));
}

public function update(Request $request, Karyawan $karyawan)
{
    $request->validate([
        'nik' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'no_telepon' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'departemen' => 'required|exists:departemens,id',
        'jabatan' => 'required|exists:jabatans,id',
        'alamat' => 'required|string|max:255',
        'tanggal_bergabung' => 'required|date',
    ]);

    $karyawan->nik = $request->nik;
    $karyawan->name = $request->name;
    $karyawan->departemen_id = $request->departemen;
    $karyawan->jabatan_id = $request->jabatan;
    $karyawan->tanggal_bergabung = $request->tanggal_bergabung;
    $karyawan->alamat = $request->alamat;
    $karyawan->no_telepon = $request->no_telepon;
    $karyawan->email = $request->email;
    $karyawan->status_keanggotaan = 'aktif';
    $karyawan->expired = Carbon::parse($request->tanggal_bergabung)->addYear(1);
    $karyawan->save();

    return redirect()->route('karyawan.index')->with('success', 'Karyawan updated successfully');
}

public function destroy($id)
{
    $karyawan = Karyawan::findOrFail($id);
    $karyawan->delete();

    return redirect()->route('karyawan.index')->with('success', 'Karyawan deleted successfully');
}

public function exportPDF(){
    $karyawan = Karyawan::all();
    $data = ['karyawan' => $karyawan];
    $pdf = Pdf::loadView('karyawan.exportPdf', $data);
    return $pdf->download('karyawan.pdf');
}


}

