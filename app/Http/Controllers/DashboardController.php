<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Karyawan;

class DashboardController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all(); // Mengambil semua data karyawan
        return view('dashboard.index', compact('karyawans'));
    }
    }
