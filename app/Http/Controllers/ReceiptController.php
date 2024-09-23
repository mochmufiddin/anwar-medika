<?php

namespace App\Http\Controllers;

use App\Models\Examination;
use App\Models\ExaminationState;
use App\Models\UserActivity;
use App\Repositories\ExaminationRepository;
use App\Repositories\MedicineRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;

class ReceiptController extends Controller
{
    public $examinationRepository;
    public $medicineRepository;

    public function __construct()
    {
        $this->examinationRepository = new ExaminationRepository();
        $this->medicineRepository = new MedicineRepository();
    }

    public function index()
    {
        if (!auth()->user()->hasRole('pharmacist')) {
            throw UnauthorizedException::forPermissions(['pharmacist']);
        }

        $examinations = $this->examinationRepository->getLatestExaminations();

        return view('admin.receipt.index', compact('examinations'));
    }

    public function show($id){
        if (!auth()->user()->hasRole('pharmacist')) {
            throw UnauthorizedException::forPermissions(['pharmacist']);
        }

        $examinationData = $this->examinationRepository->getDetails($id);
        return view('admin.receipt.show', compact('examinationData'));
    }

    public function edit($id){
        if (!auth()->user()->hasRole('pharmacist')) {
            throw UnauthorizedException::forPermissions(['pharmacist']);
        }

        $examinationData = $this->examinationRepository->getDetails($id);
        return view('admin.receipt.edit', compact('examinationData'));
    }

    public function process($id){
        if (!auth()->user()->hasRole('pharmacist')) {
            throw UnauthorizedException::forPermissions(['pharmacist']);
        }

        // Find the examination by ID
        $examination = Examination::findOrFail($id);
        
        ExaminationState::create([
            'examination_id' => $examination->id,
            'name' => 'processed',
        ]);

        // Log the activity
        UserActivity::create([
            'user_id' => auth()->id(), 
            'action' => 'chaenge examination state',
            'model_type' => 'ExaminationState',
            'model_id' => $examination->id,
        ]);

        // Redirect or return response
        return redirect()->route('receipt')->with('success', 'Examination has been processed successfully.');
    }
}
