<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'phone_number', 'date_of_birth',
    ];

    public function examinations()
    {
        return $this->hasMany(Examination::class);
    }
}
