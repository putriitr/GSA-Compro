<?php

namespace App\Http\Controllers\Member\Ticketing;

use App\Http\Controllers\Controller;
use App\Models\Ticketing;
use Illuminate\Http\Request;

class TicketingMemberController extends Controller
{
    // Menampilkan daftar ticketing milik member
    public function index()
    {
        $ticketings = Ticketing::where('user_id', auth()->id())->get();
        return view('member.portal.ticketing', compact('ticketings'));
    }

    public function ticketing()
    {
        // Ambil semua data ticketings dari database
        $ticketings = Ticketing::all();

        // Kirim data ticketings ke tampilan
        return view('member.portal.ticketing', compact('ticketings'));
    }

    // Menampilkan form untuk membuat ticketing
    public function create()
    {
        return view('member.ticketing.create');
    }

    // Menyimpan ticketing baru
    public function store(Request $request)
    {
        $request->validate([
            'service_type' => 'required|string',
            'description' => 'required|string',
            'document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $ticketing = new Ticketing();
        $ticketing->user_id = auth()->id();
        $ticketing->service_type = $request->service_type;
        $ticketing->description = $request->description;

        // Upload dokumen jika ada
        if ($request->hasFile('document')) {
            $ticketing->document = $request->file('document')->store('documents', 'public');
        }

        $ticketing->save();

        return redirect()->route('ticketings.index')->with('success', 'Ticketing berhasil dibuat.');
    }

    // Menampilkan detail ticketing
    public function show(Ticketing $ticketing)
    {
        return view('member.ticketing.show', compact('ticketing'));
    }

    // Menampilkan form untuk mengedit ticketing
    public function edit(Ticketing $ticketing)
    {
        // Pastikan hanya bisa edit jika status 'open'
        if ($ticketing->status === 'open') {
            return view('member.ticketing.edit', compact('ticketing'));
        }
        return redirect()->route('ticketings.index')->with('error', 'Tidak dapat mengedit ticketing yang sudah diproses.');
    }

    // Mengupdate ticketing
    public function update(Request $request, Ticketing $ticketing)
    {
        $request->validate([
            'service_type' => 'required|string',
            'description' => 'required|string',
            'document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Update data ticketing
        $ticketing->update($request->all());

        // Upload dokumen jika ada
        if ($request->hasFile('document')) {
            $ticketing->document = $request->file('document')->store('documents', 'public');
        }

        return redirect()->route('ticketings.index')->with('success', 'Ticketing berhasil diperbarui.');
    }

    // Menghapus ticketing
    public function destroy(Ticketing $ticketing)
    {
        // Hanya bisa batal jika status 'open'
        if ($ticketing->status === 'open') {
            $ticketing->delete();
            return redirect()->route('ticketings.index')->with('success', 'Ticketing berhasil dibatalkan.');
        }
        return redirect()->route('ticketings.index')->with('error', 'Tidak dapat membatalkan ticketing yang sudah diproses.');
    }
}
