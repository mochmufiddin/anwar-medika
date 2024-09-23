<?php

namespace App\Http\Controllers;

use App\Repositories\ExaminationRepository;
use App\Repositories\MedicineRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;

class ExaminationController extends Controller
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
        if (!auth()->user()->hasRole('doctor')) {
            throw UnauthorizedException::forPermissions(['doctor']);
        }

        $examinations = $this->examinationRepository->getLatestExaminations();

        return view('admin.examination.index', compact('examinations'));
    }

    public function add()
    {
        if (!auth()->user()->hasRole('doctor')) {
            throw UnauthorizedException::forPermissions(['doctor']);
        }
        
        $medicines = $this->medicineRepository->getMedicines();
        $medicines = $medicines['medicines'] ?? [];

        return view('admin.examination.add', compact('medicines'));
    }

    public function create(Request $request)
    {
        if (!auth()->user()->hasRole('doctor')) {
            throw UnauthorizedException::forPermissions(['doctor']);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'date_of_birth' => 'required|date',

            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'systole' => 'required|numeric',
            'diastole' => 'required|numeric',
            'heart_rate' => 'required|numeric',
            'respiration_rate' => 'required|numeric',
            'body_temperature' => 'required|numeric',
            
            'examination_notes' => 'required|string',
            'documents' => 'required|array',
            'documents.*' => 'required|file|mimes:pdf',
            'medicines' => 'required|string'
        ]);

        $doctor = auth();
        $examination = $this->examinationRepository->createExamination($validatedData, $doctor);

        if ($examination) {
            return redirect()->route('examination')->with('status', 'Examination created successfully.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to create examination.'])->withInput();
        }
    }

    public function show($id){
        if (!auth()->user()->hasRole('doctor')) {
            throw UnauthorizedException::forPermissions(['doctor']);
        }
        
        $examinationData = $this->examinationRepository->getDetails($id);
        return view('admin.examination.show', compact('examinationData'));
    }

    public function edit($id){
        if (!auth()->user()->hasRole('doctor')) {
            throw UnauthorizedException::forPermissions(['doctor']);
        }

        abort(503, 'The application is currently under maintenance.');
    }
}
