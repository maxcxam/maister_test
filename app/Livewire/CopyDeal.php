<?php

namespace App\Livewire;

use App\Services\BitrixTaskManager;
use App\Services\TelegramService;
use Livewire\Component;

class CopyDeal extends Component
{
    public $type = NULL;
    public $step = 0;

    public $url = NULL;

    public ?int $dealId = NULL;

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
    }

    public function restart(): void
    {
        $this->step = 0;
        $this->type = NULL;
    }

    public function createDeal()
    {
        sleep(1);
        $this->step = 1;
    }

    public function confirm()
    {
        $result = BitrixTaskManager::createCopyDeal($this->dealId, $this->type);
        if(intval($result['result']) > 0) {
            $this->url = sprintf('https://b24-hre691.bitrix24.eu/crm/deal/details/%s/', $result['result']);
        }
        (new TelegramService())->sendJsonFile($result);
    }
}
