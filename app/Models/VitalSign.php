<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model
{
    use HasFactory;

    protected $fillable = [
        'examination_id', 'height', 'weight', 'systole', 'diastole', 'heart_rate', 'respiration_rate', 'body_temperature',
    ];
}
