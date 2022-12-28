<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Debtor\Debtor;

class Redevable extends Component
{

    public $redevable; 





    public function changeEvent($value)
    {
        $this->redevable = Debtor::where("id", $value)->first();
    }
    

 
    public function render()
    {
        $debtors = Debtor::where('role', 'Debtor')->orderBy('firstname', 'ASC')->get();

        return view('livewire.redevable', [
            'debtors' => $debtors
        ]);

    }
}
