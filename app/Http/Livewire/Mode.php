<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Loan\Bank;

class Mode extends Component
{
  
        public $mode = "";


        public function changeEvent($value)
        {
            $this->mode=$value;
        }
     
        public function render()
        {
            $allBank = Bank::orderBy('name', 'ASC')->get();

            return view('livewire.mode-paiement', [
            'allBank' => $allBank
            ]);
           
        }







}
