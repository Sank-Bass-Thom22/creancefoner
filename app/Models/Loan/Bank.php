<?php

namespace App\Models\Loan;

use App\Models\Loan\Repayment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'telephone',
        'description',
    ];

    public function repayments()
    {
        return $this->hasMany(Repayment::class, 'id_bank');
    }
}
