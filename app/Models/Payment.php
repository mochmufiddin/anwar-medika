<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'examination_id', 'amount', 'payment_method', 'status',
    ];

    public function examination()
    {
        return $this->belongsTo(Examination::class);
    }
}
