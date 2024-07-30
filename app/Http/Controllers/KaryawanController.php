<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $karyawan = new Karyawan;
        $karyawan->nik = $request->nik;
        $karyawan->name = $request->name;
        $karyawan->departemen = $request->departemen;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->tanggal_bergabung = $request->tanggal_bergabung;
        $karyawan->alamat = $request->alamat;
        $karyawan->no_telepon = $request->no_telepon;
        $karyawan->email = $request->email;
        $karyawan->status_keanggotaan = 'aktif';
        $karyawan->password = bcrypt($request->password);
        $karyawan->expired = Carbon::parse($request->tanggal_bergabung)->addYear(1);
        $karyawan->save();

        return redirect()->route('karyawan.index')->with('success', 'Karyawan created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($nik)
    {
        $karyawan = Karyawan::where('nik', $nik)->first();
        if(!$karyawan){
            return redirect()->route('karyawan.index')->with('error', 'Karyawan Not Found');
        }
        return view('karyawan.show', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->nik = $request->nik;
        $karyawan->name = $request->name;
        $karyawan->departemen = $request->departemen;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->tanggal_bergabung = $request->tanggal_bergabung;
        $karyawan->alamat = $request->alamat;
        $karyawan->no_telepon = $request->no_telepon;
        $karyawan->email = $request->email;
        $karyawan->status_keanggotaan = 'aktif';
        $karyawan->expired = Carbon::parse($request->tanggal_bergabung)->addYear(1);
        $karyawan->save();

        return redirect()->route('karyawan.index')->with('success', 'Karyawan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index')->with('success', 'Karyawan deleted successfully');
    }
}
