<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model
{
    use HasFactory;

    protected $fillable = [
        'height', 'weight', 'systole', 'diastole', 'heart_rate', 'respiration_rate', 'body_temperature',
    ];
}
