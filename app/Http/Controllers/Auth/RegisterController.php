<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Karyawan;

class RegisterController extends Controller
{
    // Menampilkan form register
    public function showRegistrationForm()
    {
        $users = Karyawan::all(); 
        return view('auth.register', compact('users')); // Mengirimkan data ke view
    }

    // Menangani proses pendaftaran
    public function register(Request $request)
    {
        // Validasi input
        /* $request->validate([
            'nik' => 'required|string|max:255|unique:users,nik',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
            'role' => 'required|string|in:admin,user',
        ]); */

        // Membuat user baru
        $user = new User;
        $user->nik = $request->nik;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        // Redirect ke halaman login setelah berhasil mendaftar
        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
