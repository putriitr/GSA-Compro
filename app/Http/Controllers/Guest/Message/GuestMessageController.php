<?php

namespace App\Http\Controllers\Guest\Message;

use App\Http\Controllers\Controller;
use App\Models\GuestMessage;
use Illuminate\Http\Request;

class GuestMessageController extends Controller
{
    public function store(Request $request)
    {
        // Ambil alamat IP pengunjung
        $ipAddress = $request->ip();

        // Validasi data yang dikirim dari form
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Gabungkan first_name dan last_name
        $fullName = $validatedData['first_name'] . ' ' . $validatedData['last_name'];

        // Periksa apakah IP yang sama sudah mengirim pesan dalam 12 jam terakhir
        $existingMessage = GuestMessage::where('ip_address', $ipAddress)
            ->where('created_at', '>=', now()->subHours(12))
            ->first();

        if ($existingMessage) {
            // Hitung sisa waktu hingga pengguna bisa mengirim pesan lagi
            $timeRemaining = now()->diffInMinutes($existingMessage->created_at->addHours(12));

            $hoursRemaining = floor($timeRemaining / 60);
            $minutesRemaining = $timeRemaining % 60;

            return redirect()->back()->withErrors([
                'error' => "Anda hanya dapat mengirim satu pesan setiap 12 jam. Silakan coba lagi dalam $hoursRemaining jam $minutesRemaining menit."
            ]);
        }

        // Simpan data ke database
        GuestMessage::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'no_wa' => $validatedData['phone'],
            'perusahaan' => $validatedData['company'],
            'subject' => $validatedData['subject'],  // pastikan 'subject' ada di tabel
            'pesan' => $validatedData['message'],
            'ip_address' => $ipAddress,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Pesan Anda telah berhasil dikirim.');
    }

    public function index()
    {
        $messages = GuestMessage::all();
        return view('Admin.Guest.index', compact('messages'));
    }
}
