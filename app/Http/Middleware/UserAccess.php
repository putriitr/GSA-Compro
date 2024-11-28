<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        if (auth()->check() && auth()->user()->type == $userType) {
            return $next($request);
        }

        // Tambahkan pesan yang disesuaikan untuk setiap role
        $message = match ($userType) {
            'admin' => 'Halaman ini hanya dapat diakses oleh Admin.',
            'member' => 'Akses halaman ini khusus untuk Member terdaftar. Jika Anda belum menjadi member, silakan hubungi admin untuk pendaftaran.',
            'distributor' => 'Halaman ini hanya tersedia untuk Distributor. Daftarkan diri Anda sebagai distributor untuk melanjutkan akses.',
            'vendor' => 'Akses halaman ini khusus untuk Vendor terdaftar. Jika Anda belum menjadi vendor, silakan hubungi admin untuk pendaftaran.',
            default => 'Anda tidak memiliki izin untuk mengakses halaman ini.',
        };

        return redirect()->back()->with('error', $message);
    }
}
