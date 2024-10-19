<?php

namespace App\Livewire;

use Livewire\Component;

class CopyDeal extends Component
{
    public $type = NULL;

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
        return view('livewire.copy-deal');
    }
}
