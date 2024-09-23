<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExaminationState extends Model
{
    use HasFactory;

    protected $fillable = ['examination_id', 'name'];

}
