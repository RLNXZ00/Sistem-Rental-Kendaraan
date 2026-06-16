<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminKeamananController extends Controller
{
    /**
     * Display the Admin Keamanan Dashboard.
     */
    public function index()
    {
        // Get password reset requests
        $passwordResets = DB::table('password_reset_tokens')
            ->join('users', 'password_reset_tokens.email', '=', 'users.email')
            ->select('password_reset_tokens.*', 'users.name')
            ->orderBy('password_reset_tokens.created_at', 'desc')
            ->get();

        // Get account deletion requests
        $deletionRequests = User::whereNotNull('deletion_requested_at')
            ->orderBy('deletion_requested_at', 'desc')
            ->get();

        return view('admin.keamanan.index', compact('passwordResets', 'deletionRequests'));
    }

    /**
     * Proses reset kata sandi menjadi sandi sementara.
     */
    public function prosesResetSandi(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $email = $request->email;
        $user = User::where('email', $email)->first();

        // Generate a new reset token using Laravel's built-in password broker
        $token = \Illuminate\Support\Facades\Password::broker()->createToken($user);
        
        // Construct the reset link
        $resetLink = url(route('password.reset', [
            'token' => $token,
            'email' => $user->email,
        ], false));

        // Menyimpan link reset di session untuk ditampilkan 1 kali
        return redirect()->back()->with('success_reset_link', [
            'name' => $user->name,
            'link' => $resetLink
        ]);
    }

    /**
     * Hapus akun pengguna secara permanen.
     */
    public function hapusAkunPermanen(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $nama = $user->name;
        
        $user->delete();

        return redirect()->back()->with('success', "Akun {$nama} berhasil dihapus permanen.");
    }

    /**
     * Batalkan permohonan hapus akun.
     */
    public function tolakHapusAkun(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->deletion_requested_at = null;
        $user->save();

        return redirect()->back()->with('success', "Permohonan hapus akun untuk {$user->name} telah ditolak/dibatalkan.");
    }
}
