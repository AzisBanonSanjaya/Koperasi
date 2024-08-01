<?php

namespace App\Http\Controllers;
use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index()
    {
        $departemens = Departemen::all();
        return view('departemen.index', compact('departemens'));
    }

    public function create()
    {
        return view('departemen.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|unique:departemens,name'
        ]);
    
        // Menyimpan data
        $departemen = new Departemen;
        $departemen->name = $request->name;
        $departemen->save();
    
        return redirect()->route('departemen.index')->with('success', 'Departemen created successfully');
    }

    public function show($id)
    {
        $departemen = Departemen::find($id);
        if (!$departemen) {
            return redirect()->back()->with('error', 'Departemen not found');
        }

        $karyawanList = $departemen->karyawan; // Menggunakan relasi

        return view('departemen.show', compact('departemen', 'karyawanList'));
    }

    public function edit($id)
    {
        $departemen = Departemen::findOrFail($id);
        return view('departemen.edit', compact('departemen'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $departemen = Departemen::findOrFail($id);
        $request->validate([
            'name' => 'required|unique:departemens,name,' . $departemen->id
        ]);

        // Mengupdate data
        $departemen->name = $request->name;
        $departemen->save();

        return redirect()->route('departemen.index')->with('success', 'Departemen updated successfully');
    }

    public function destroy($id)
    {
        $departemen = Departemen::findOrFail($id);
        $departemen->delete();

        return redirect()->route('departemen.index')->with('success', 'Departemen deleted successfully');
    }
}