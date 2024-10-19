<?php

namespace App\Livewire;

use Livewire\Component;

class CopyDeal extends Component
{
    public $type = NULL;
    public $step = 0;

    public $cases = [
        'A' => 'Перекріпити майстра',
        'B' => 'Допродана угода',
        'C' => 'Друга послуга',
        'D' => 'Друге звернення клієнта',
    ];
    public function render()
    {
        return view('livewire.copy-deal');
    }

    public function changeType()
    {
        $this->step = 1;
    }

    public function reset()
    {
        $this->step = 0;
    }
}
