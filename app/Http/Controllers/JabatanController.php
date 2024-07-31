<?php

namespace App\Http\Controllers;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::all();
        return view('jabatan.index', compact('jabatans'));
    }

    public function create()
    {
        return view('jabatan.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|unique:jabatan,name'
        ]);

        // Menyimpan data
        $jabatan = new Jabatan;
        $jabatan->name = $request->name;
        $jabatan->save();

        return redirect()->route('jabatan.index')->with('success', 'Jabatan created successfully');
    }

    public function show($name)
    {
        $jabatan = Jabatan::where('name', $name)->first();
        if (!$jabatan) {
            return redirect()->route('jabatan.index')->with('error', 'Jabatan not found');
        }
        return view('jabatan.show', compact('jabatan'));
    }

    public function edit($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        return view('jabatan.edit', compact('jabatan'));
    }

    public function update(Request $request, Jabatan $jabatan)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|unique:jabatan,name,' . $jabatan->id
        ]);

        // Mengupdate data
        $jabatan->name = $request->name;
        $jabatan->save();

        return redirect()->route('jabatan.index')->with('success', 'Jabatan updated successfully');
    }

    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        return redirect()->route('jabatan.index')->with('success', 'Jabatan deleted successfully');
    }
}
