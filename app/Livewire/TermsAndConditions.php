<?php

namespace App\Livewire;

use Livewire\Component;

class TermsAndConditions extends Component
{
    public $isChecked = false;
    public $doctor;
    public $date;
    public $center;
    public $total;
    public $queueNo;
    public $referenceId;

    public function toggleCheckbox()
    {
        $this->isChecked = !$this->isChecked;
    }

    public function render()
    {
        return view('livewire.terms-and-conditions');
    }
}
