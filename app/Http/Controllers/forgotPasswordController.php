<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Gunakan Illuminate\Support\Facades\Auth
use Illuminate\Support\Facades\Session; // Gunakan Illuminate\Support\Facades\Session
use App\Models\User;

class ForgotPasswordController extends Controller // Ubah nama kontroler sesuai dengan konvensi penamaan
{
    public function forgotPassword()
    {
        return view('Auth.forgot-password', [
            "title" => "Forgot Password",
        ]);
    }

    public function updatePassword(Request $request)
    {
        // Validasi nomor WhatsApp dan email di sini
        $validatedData = $request->validate([
            'whatsapp' => 'required',
            'email' => 'required|email',
        ]);

        // Cek apakah nomor WhatsApp dan email cocok dalam basis data
        $user = User::where('whatsapp', $validatedData['whatsapp'])
            ->where('email', $validatedData['email'])
            ->first();

        if ($user) {
            // Jika cocok, arahkan ke halaman reset password
            return view('Auth.reset-password', [
                "title" => "Reset Password",
                "user" => $user, // Mengirim data pengguna ke halaman reset password
            ]);
        } else {
            // Jika tidak cocok, beri pesan error dan kembali ke halaman lupa password
            return redirect()->back()->with('error', 'Nomor WhatsApp atau email tidak cocok.');
        }
    }
    public function resetPassword(Request $request)
    {
        // Validasi data form reset password
        $validatedData = $request->validate([
            'user_id' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        // Cari pengguna berdasarkan ID
        $user = User::find($validatedData['user_id']);

        if (!$user) {
            // Jika pengguna tidak ditemukan, berikan pesan error dan arahkan kembali ke halaman lupa password
            return redirect('/forgot-password')->with('error', 'Pengguna tidak ditemukan.');
        }

        // Simpan password baru ke dalam basis data
        $user->password = bcrypt($validatedData['password']);
        $user->save();

        // Beri pesan sukses dan arahkan ke halaman login atau halaman lain yang sesuai
        return redirect('/login')->with('success', 'Password Anda telah diatur ulang. Silakan masuk dengan password baru Anda.');
    }
}
