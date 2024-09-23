<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id', 'patient_id', 'appointment_date', 'examination_notes'
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
        return $this->hasOne(VitalSign::class);
    }

    public function documents()
    {
        return $this->hasMany(ExaminationDocument::class);
    }

    public function details()
    {
        return $this->hasMany(ExaminationDetail::class);
    }

    public function states()
    {
        return $this->hasMany(ExaminationState::class)->orderBy('id', 'desc');;
    }

    public function latestState()
    {
        return $this->hasOne(ExaminationState::class)->latest();
    }
}
