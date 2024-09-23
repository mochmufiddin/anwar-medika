<?php

namespace App\Http\Controllers;

use App\Repositories\ExaminationRepository;
use Illuminate\Http\Request;


class ExaminationController extends Controller
{
    public $examinationRepository;

    public function __construct()
    {
        $this->examinationRepository = new ExaminationRepository();
    }

    public function index()
    {
        $examinations = $this->examinationRepository->getLatestExaminations();
        return view('admin.examination.index', compact('examinations'));
    }

    public function add()
    {
        return view('admin.examination.add');
    }

    public function create(Request $request)
    {
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
        ]);

        $doctor = auth();
        $examination = $this->examinationRepository->createExamination($validatedData, $doctor);

        if ($examination) {
            return redirect()->route('examination')->with('status', 'Examination created successfully.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to create examination.'])->withInput();
        }
    }
}
