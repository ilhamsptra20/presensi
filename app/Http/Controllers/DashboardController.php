<?php

namespace App\Http\Controllers;

use App\Models\Absent;
use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $rombels = Rombel::get();
        $rayons = Rayon::get();
        $students = Student::get();
        $absents = Absent::get();
        return view('dashboard.index', compact('rayons', 'rombels', 'students', 'absents'));
    }
}
