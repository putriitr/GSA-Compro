<?php

namespace App\Http\Controllers\Member\Activity;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityMemberController extends Controller
{
    public function activity()
    {
        $activities = Activity::paginate(8); // 8 items per page, sesuaikan jika perlu
        return view('member.activity.activity', compact('activities'));
    }

    public function show(Activity $activity)
    {
        return view('member.activity.detail-act', compact('activity'));
    }


}
