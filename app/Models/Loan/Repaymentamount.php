<?php

namespace App\Models\Loan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repaymentamount extends Model
{
    use HasFactory;

    protected $fillable = [
        'minamount',
        'maxamount',
        'description',
    ];
}
