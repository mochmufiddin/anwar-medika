<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExaminationDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'examination_id', 'medication_name', 'quantity', 'dosage',
    ];

    public function examination()
    {
        return $this->belongsTo(Examination::class);
    }
}
