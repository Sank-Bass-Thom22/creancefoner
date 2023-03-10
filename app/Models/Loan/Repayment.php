<?php

namespace App\Models\Loan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'repaymentdate',
        'repaymentway',
        'description',
        'id_bank',
        'id_debtor',
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'id_bank');
    }
}
