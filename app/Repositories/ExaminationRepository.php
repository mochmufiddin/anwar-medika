<?php

namespace App\Repositories;

use App\Models\Patient;
use App\Models\VitalSign;
use App\Models\Examination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Exception;

class ExaminationRepository
{
    public function createExamination($data, $doctor)
    {
        DB::beginTransaction();

        try {

            // Step 1: Buat atau update data pasien
            $patient = Patient::updateOrCreate(
                ['phone_number' => $data['phone_number']],
                [
                    'name' => $data['name'],
                    'address' => $data['address'],
                    'date_of_birth' => $data['date_of_birth'],
                ]
            );

            // Step 2: Simpan data pemeriksaan
            $examination = Examination::create([
                'examination_notes' => $data['examination_notes'],
                'doctor_id' => $doctor->id(),
                'patient_id' => $patient->id,
                'appointment_date' => now(),
            ]);

            // Step 3: Simpan tanda-tanda vital
            $vitalSign = VitalSign::create([
                'examination_id' => $examination->id,
                'height' => $data['height'],
                'weight' => $data['weight'],
                'systole' => $data['systole'],
                'diastole' => $data['diastole'],
                'heart_rate' => $data['heart_rate'],
                'respiration_rate' => $data['respiration_rate'],
                'body_temperature' => $data['body_temperature'],
            ]);

            // Step 3: Simpan state
            $examination->states()->create([
                'examination_id' => $examination->id,
                'state' => 'submitted',
            ]);

            DB::commit();

            return $examination;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception('Error processing data: ' . $e->getMessage());
        }
    }

    public function getLatestExaminations()
    {
        $examinations = Examination::select('examinations.*', 
            DB::raw('(SELECT name FROM examination_states WHERE examination_states.examination_id = examinations.id ORDER BY examination_states.id DESC LIMIT 1) as latest_state'),
            'users.name as doctor_name',
            'patients.name as patient_name')
            ->leftJoin('users', 'examinations.doctor_id', '=', 'users.id')
            ->leftJoin('patients', 'examinations.patient_id', '=', 'patients.id')
            ->orderBy('examinations.id', 'desc')
            ->get();
        return $examinations;
    }

}
