<?php

namespace App\Http\Controllers;

use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use App\Models\Karyawan;

class PinjamanController extends Controller
{
    // Menampilkan daftar pinjaman
    public function index(Request $request)
    {
        $filterNik = $request->filter_user;
        $nik = Auth::user()->role == 'user' ? Auth::user()->nik : '';
        if(empty($filterNik)){
            if(Auth::user()->role != 'user'){
                $pinjamans = Pinjaman::all();
            }else{
                $pinjamans = Pinjaman::where('nik',  $nik)->get();
            }
        }else{
            $pinjamans = Pinjaman::where('nik',  $filterNik)->get();
        }
        $karyawans = Karyawan::all();
        return view('pinjaman.index', compact('pinjamans','karyawans','filterNik'));
    }

    // Menampilkan form untuk membuat pinjaman baru
    public function create()
    {
        
        $karyawans = Karyawan::all();
        $nik = Auth::user()->role == 'user' ? Auth::user()->nik : '';
        return view('pinjaman.create', compact('karyawans','nik'));
        
    }

    // Menyimpan data pinjaman baru
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'jumlah_pinjaman' => 'required',
            'tanggal_pinjam' => 'required|date',
            'jangka_waktu' => 'required|string',
            'estimasi' => 'required|integer',
            'bunga_persen' => 'required|numeric',
            'total_bunga' => 'required',
            'total_angsuran' => 'required',
            'nik' => 'required',
            'nama' => 'required',
        ]);
        $validatedData['jumlah_pinjaman'] = str_replace(',', '', $request->jumlah_pinjaman);
        $validatedData['total_bunga'] = str_replace(',', '', $request->total_bunga);
        $validatedData['total_angsuran'] = str_replace(',', '', $request->total_angsuran);
        $validatedData['jangka_waktu'] = $request->estimasi.' '.$request->jangka_waktu;
        $validatedData['sisa_angsuran'] = str_replace(',', '', $request->jumlah_pinjaman);

        $pinjaman = Pinjaman::where('nik', $request->nik)->where('sisa_angsuran', '>', 0)->first();

        if($pinjaman) {
            return redirect()->route('pinjaman.index')->with('error', 'Pinjaman sudah beres!');
        }

        // Buat instance baru dari model Pinjaman
        if($request->jumlah_pinjaman <= '3000000') {
            $pinjaman = new Pinjaman($validatedData);
            $pinjaman->save();

             // Redirect ke halaman index dengan pesan sukses
            return redirect()->route('pinjaman.index')->with('success', 'Pinjaman berhasil dibuat.');
        } else {
            // Redirect ke halaman index dengan pesan sukses
            return redirect()->route('pinjaman.index')->with('error', 'Pinjaman tidak boleh dari 3.000.000');
        }
    }

    // Menampilkan form untuk mengedit pinjaman
    public function edit($id)
    {
        $pinjaman = Pinjaman::findOrFail($id);
        $karyawans = Karyawan::all();
        $nik = Auth::user()->role == 'user' ? Auth::user()->nik : '';
        $jangka_waktu = explode(' ', $pinjaman->jangka_waktu);
        return view('pinjaman.edit', compact('pinjaman','karyawans','nik', 'jangka_waktu'));
    }

    // Memperbarui data pinjaman
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'jumlah_pinjaman' => 'required',
            'tanggal_pinjam' => 'required|date',
            'jangka_waktu' => 'required|string',
            'estimasi' => 'required|integer',
            'bunga_persen' => 'required|numeric',
            'total_bunga' => 'required',
            'total_angsuran' => 'required',
            'nik' => 'required',
            'nama' => 'required',
        ]);
        $validatedData['jumlah_pinjaman'] = str_replace(',', '', $request->jumlah_pinjaman);
        $validatedData['total_bunga'] = str_replace(',', '', $request->total_bunga);
        $validatedData['total_angsuran'] = str_replace(',', '', $request->total_angsuran);
        $validatedData['jangka_waktu'] = $request->estimasi.' '.$request->jangka_waktu;
        $validatedData['sisa_angsuran'] = str_replace(',', '', $request->jumlah_pinjaman);

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
    

    public function exportPDF(Request $request)
    {
        $filterNik = $request->filter_user;
        $nik = Auth::user()->role == 'user' ? Auth::user()->nik : '';
        if(empty($filterNik)){
            if(Auth::user()->role != 'user'){
                $pinjamans = Pinjaman::all();
            }else{
                $pinjamans = Pinjaman::where('nik',  $nik)->get();
            }
        }else{
            $pinjamans = Pinjaman::where('nik',  $filterNik)->get();
        }
        
        $data = ['pinjamans' => $pinjamans];
        $pdf = Pdf::loadView('pinjaman.exportPdf', $data);
        return $pdf->download('pinjaman.pdf');
    }
}
