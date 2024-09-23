<?php

namespace App\Http\Controllers;

use App\Models\Examination;
use App\Models\Patient;
use App\Models\User;

class DashboardController extends Controller
{

    public function index()
    {
        $totalPatients = Patient::count();
        $totalExaminations = Examination::count();
        $totalDoctors = User::where('role', 'doctor')->count();
        $totalPharmacists = User::where('role', 'pharmacist')->count();

        return view('dashboard', compact('totalPatients', 'totalExaminations', 'totalDoctors', 'totalPharmacists'));
    }

}
