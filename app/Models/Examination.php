<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id', 'patient_id', 'vital_signs_id', 'appointment_date', 'examination_notes', 'documents', 'state_id',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function vitalSigns()
    {
        return $this->belongsTo(VitalSign::class);
    }

    public function details()
    {
        return $this->hasMany(ExaminationDetail::class);
    }

    public function state()
    {
        return $this->belongsTo(ExaminationState::class, 'state_id');
    }
}
