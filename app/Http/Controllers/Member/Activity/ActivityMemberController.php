<?php

namespace App\Http\Controllers\Member\Activity;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityMemberController extends Controller
{
    public function activity()
    {
        $activities = Activity::paginate(9);
        return view('member.activity.activity', compact('activities')); // Kirim ke view
    }

    public function show($id)
    {
        $activity = Activity::findOrFail($id); // Ambil aktivitas berdasarkan ID
        return view('member.activity.detail-act', compact('activity')); // Kirim ke view
    }
}
