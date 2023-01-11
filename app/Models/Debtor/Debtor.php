<?php

namespace App\Models\Debtor;

use App\Models\Loan\Loan;
use App\Models\Loan\Schedule;
use App\Models\Loan\Repayment;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Debtor extends Authenticatable
{
  
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'firstname',
        'lastname',
        'servicename',
        'email',
        'telephone',
        'codefoner',
        'role',
        'serviceindex',
        'debtorindex',
        'password',
        'servicelocation',
        'emailDRH',
        'telephoneDRH',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class, 'id_debtor');
    }

    public function repayments()
    {
        return $this->hasMany(Repayment::class, 'id_debtor');
    }

    public function schedule()
    {
        return $this->hasOne(Schedule::class, 'id_debtor');
    }
}
