<?php

namespace App\Http\Controllers\Admin\Ticketing;

use App\Http\Controllers\Controller;
use App\Models\Ticketing;
use Illuminate\Http\Request;

class TicketingController extends Controller
{
    // Menampilkan daftar semua ticketing
    public function index()
    {
        $ticketings = Ticketing::all();
        return view('member.portal.ticketing', compact('ticketings'));
    }

    // Menampilkan detail ticketing
    public function show(Ticketing $ticketing)
    {
        return view('member.ticketing.show', compact('ticketing'));
    }

    // Memproses ticketing
    public function process(Ticketing $ticketing)
    {
        // Pastikan hanya bisa proses jika status 'open'
        if ($ticketing->status === 'open') {
            $ticketing->update(['status' => 'in_progress']);
            return redirect()->route('ticketings.index')->with('success', 'Ticketing berhasil diproses.');
        }
        return redirect()->route('ticketings.index')->with('error', 'Ticketing tidak dapat diproses.');
    }

    // Menyelesaikan ticketing
    public function complete(Ticketing $ticketing)
    {
        // Pastikan hanya bisa selesai jika status 'in_progress'
        if ($ticketing->status === 'in_progress') {
            $ticketing->update(['status' => 'closed']);
            return redirect()->route('ticketings.index')->with('success', 'Ticketing berhasil diselesaikan.');
        }
        return redirect()->route('ticketings.index')->with('error', 'Ticketing tidak dapat diselesaikan.');
    }
}
