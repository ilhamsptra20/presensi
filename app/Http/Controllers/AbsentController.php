<?php

namespace App\Http\Controllers;

use App\Models\Absent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsentController extends Controller
{
    public function arrival(Request $request)
    {
        $attr = [
            'nis' => Auth::user()->nis,
            'arrival_time' => now(),
            'go_home' => null,
            'description' => 'Hadir',
            'proof' => null,
        ];

        Absent::create($attr);

        return back()->with('success');
    }

    public function go_home(Request $request, Absent $absent)
    {
        $attr = [
            'nis' => Auth::user()->nis,
            'arrival_time' => $request->arrival_time,
            'go_home' => now(),
            'description' => 'Hadir',
            'proof' => null,
        ];

        $absent->update($attr);

        return back()->with('success');
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
}
