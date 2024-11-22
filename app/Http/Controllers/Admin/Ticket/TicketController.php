<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Models\AfterSales;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\PermintaanData;

class TicketController extends Controller
{
    public function index()
    {
        // Ambil tiket berdasarkan status dan jenis layanan
        $tickets = AfterSales::all();

        // Ambil jumlah tiket berdasarkan status
        $ticketStatuses = AfterSales::select('status')
            ->groupBy('status')
            ->pluck('status')
            ->toArray();

        // Ambil jumlah tiket berdasarkan jenis layanan
        $ticketServices = AfterSales::select('jenis_layanan')
            ->groupBy('jenis_layanan')
            ->pluck('jenis_layanan')
            ->toArray();

        // Hitung jumlah tiket berdasarkan status
        $ticketCountsByStatus = AfterSales::selectRaw('count(*) as count, status')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        // Hitung jumlah tiket berdasarkan jenis layanan
        $ticketCountsByService = AfterSales::selectRaw('count(*) as count, jenis_layanan')
            ->groupBy('jenis_layanan')
            ->pluck('count', 'jenis_layanan')
            ->toArray();

        return view('Admin.Ticket.index', compact('tickets', 'ticketStatuses', 'ticketCountsByStatus', 'ticketServices', 'ticketCountsByService'));
    }

    public function show($id)
    {
        $ticket = AfterSales::findOrFail($id);
        return view('Admin.Ticket.show', compact('ticket'));
    }

    public function process($id, Request $request)
    {
        $ticket = AfterSales::findOrFail($id);

        // ... (kode untuk proses tiket tetap sama)

        return redirect()->route('admin.tickets.index')->with('success', 'Tiket berhasil diproses.');
    }

    public function complete($id, Request $request)
    {
        $ticket = AfterSales::findOrFail($id);

        // ... (kode untuk menyelesaikan tiket tetap sama)

        return redirect()->route('admin.tickets.index')->with('success', 'Tiket berhasil diselesaikan.');
    }
}
