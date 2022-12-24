<?php

namespace App\Models\Loan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Loan\Rate;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'academicyear',
        'id_rate',
        'id_debtor',
    ];

    public function rate()
    {
        return $this->belongsTo(Rate::class, 'id_rate');
    }
}
