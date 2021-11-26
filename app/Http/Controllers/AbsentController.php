<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Absent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsentController extends Controller
{
    public function index()
    {
        $hour = 6;
        $minutes = 0;
        $today = $this->absentToday();
        $timeAbsent = Carbon::createFromTime($hour, $minutes);
        $arrival = Carbon::createFromTime($hour, $minutes);
        $lateness = Carbon::createFromTime($hour++, $minutes);
        $notPresent = Carbon::createFromTime($hour += 6, $minutes);
        $homeTime = Carbon::createFromTime($hour += 8, $minutes);
        $now = Carbon::now();

        return view('student.absent.absent', compact(
            'arrival',
            'lateness',
            'homeTime',
            'now',
            'today',
            'notPresent',
            'timeAbsent'
        ));
    }

    public function absentToday()
    {
        $user = Auth::user();
        $absents = Absent::get();
        foreach($absents as $absent){
            if ($absent->nis == $user->nis){
                $absentss = $absent->get();
                foreach($absentss as $absent){
                    if($absent->created_at->format('Y-m-d') == Carbon::now()->isoFormat('Y-M-D')){
                        return $absent;
                    }
                }
            }
        }
    }

    public function arrival(Request $request)
    {
        Absent::create($request->all());

        return back()->with('success');
    }

    public function go_home(Request $request, $id)
    {
        Absent::find($id)->update($request->all());

        return back()->with('success')->withErrors('error');
    }

    public function not_present(Request $request)
    {
        $attr = $request->validate([
            'proof' => 'required'
        ]);

        $attr = [
            'nis' => Auth::user()->nis,
            'arrival_time' => null,
            'go_home' => null,
            'description' => 'Tidak Hadir',
            'proof' => $request->proof,
        ];

        return back()->with('success');
    }

    function statistik()
    {
        $user = Auth::user();
        $absents = Absent::get();
        foreach($absents as $absent){
            if ($absent->nis == $user->nis){
                $absents = $absent->get();
                return view('student.absent.index', compact('absents'));
            }
        }
    }
}
