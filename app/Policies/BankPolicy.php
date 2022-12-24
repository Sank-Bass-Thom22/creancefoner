<?php

namespace App\Policies;

use App\Models\Debtor\Debtor;
use App\Models\Loan\Bank;
use Illuminate\Auth\Access\HandlesAuthorization;

class BankPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Debtor\Debtor  $debtor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Debtor $debtor)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Debtor\Debtor  $debtor
     * @param  \App\Models\Loan\Bank  $bank
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Debtor $debtor, Bank $bank)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Debtor\Debtor  $debtor
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Debtor $debtor)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Debtor\Debtor  $debtor
     * @param  \App\Models\Loan\Bank  $bank
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Debtor $debtor, Bank $bank)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Debtor\Debtor  $debtor
     * @param  \App\Models\Loan\Bank  $bank
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Debtor $debtor, Bank $bank)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Debtor\Debtor  $debtor
     * @param  \App\Models\Loan\Bank  $bank
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Debtor $debtor, Bank $bank)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Debtor\Debtor  $debtor
     * @param  \App\Models\Loan\Bank  $bank
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Debtor $debtor, Bank $bank)
    {
        //
    }
}
