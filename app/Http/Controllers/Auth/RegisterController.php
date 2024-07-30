<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;
class RegisterController extends Controller
{
        // Menampilkan form register
        public function showRegistrationForm()
        {
            return view('auth.register'); // Pastikan file register.blade.php ada di dalam folder resources/views/auth
        }
    
        // Menangani proses pendaftaran
        public function register(Request $request)
        {
            
            // Membuat user baru
            Karyawan::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
    
            // Redirect ke halaman login setelah berhasil mendaftar
            return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
        }
    }
