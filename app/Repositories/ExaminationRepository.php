<?php

namespace App\Repositories;

use App\Models\Patient;
use App\Models\VitalSign;
use App\Models\Examination;
use App\Models\ExaminationDetail;
use App\Models\UserActivity;
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

            // step 4: upload file
            if (isset($data['documents'])) {
                foreach ($data['documents'] as $document) {
                    $documentName = $document->getClientOriginalName();
                    $documentPath = $document->store('examination_documents', 'public');
                    $examination->documents()->create([
                        'file_name' => $documentName,
                        'file_path' => $documentPath,
                        'file_type' => $document->getClientOriginalExtension(),
                    ]);
                }
            }

            // step 5: grouping obat
            $groupedMedicines = [];
            $data['medicines'] = json_decode($data['medicines']) ?? [];
            foreach ($data['medicines'] as $medicine) {
                if (isset($groupedMedicines[$medicine->id])) {
                    $groupedMedicines[$medicine->id]['quantity'] += $medicine->quantity;
                } else {
                    $groupedMedicines[$medicine->id] = $medicine;
                }
            }

            // step 5: simpan ke examination_details
            foreach ($groupedMedicines as $medicine) {
                ExaminationDetail::create([
                    'examination_id' => $examination->id,
                    'medication_id' => $medicine->id,
                    'medication_name' => $medicine->name,
                    'quantity' => $medicine->quantity,
                    'dosage' => $medicine->dosage,
                ]);
            }

            // Log the activity
            UserActivity::create([
                'user_id' => auth()->id(), 
                'action' => 'add new examination',
                'model_type' => 'Examination',
                'model_id' => $examination->id,
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

    public function getDetails($id){
        $examinations = Examination::with(['patient', 'doctor', 'vitalSigns', 'documents', 'details', 'latestState']);
        return $examinations->find($id);
    }

}
