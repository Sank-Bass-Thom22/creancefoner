<?php

namespace App\Policies;

use App\Models\Debtor\Debtor;
use App\Models\Loan\Repayment;
use Illuminate\Auth\Access\HandlesAuthorization;

class RepaymentPolicy
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
     * @param  \App\Models\Loan\Repayment  $repayment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Debtor $debtor, Repayment $repayment)
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
     * @param  \App\Models\Loan\Repayment  $repayment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Debtor $debtor, Repayment $repayment)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Debtor\Debtor  $debtor
     * @param  \App\Models\Loan\Repayment  $repayment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Debtor $debtor, Repayment $repayment)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Debtor\Debtor  $debtor
     * @param  \App\Models\Loan\Repayment  $repayment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Debtor $debtor, Repayment $repayment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Debtor\Debtor  $debtor
     * @param  \App\Models\Loan\Repayment  $repayment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Debtor $debtor, Repayment $repayment)
    {
        //
    }
}
