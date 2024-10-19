<?php

namespace App\Livewire;

use Livewire\Component;

class CopyDeal extends Component
{
    public $type = NULL;
    public function render()
    {
        return view('livewire.copy-deal');
    }

    public function changeType()
    {
        return view('livewire.copy-deal');
    }
}
