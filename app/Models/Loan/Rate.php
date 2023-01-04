<?php

namespace App\Models\Loan;
use App\Models\Loan\Rate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'validity',
        'description',
    ];

    public function loans()
    {
        return $this->hasMany(Rate::class, 'id_rate');
    }
}
