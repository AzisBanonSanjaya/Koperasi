<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $karyawans = User::withSum('tabungan', 'saldo')->where('role', 'user')->get(); // Mengambil semua data karyawan
        return view('dashboard.index', compact('karyawans'));
    }
    }
