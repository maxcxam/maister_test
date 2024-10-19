<?php

namespace App\Services;

use App\B24\CRest;

class BitrixTaskManager
{
    public static function createCopyDeal(int $dealId, mixed $type)
    {
        $parentDeal = CRest::call('crm.deal.get', ['id' => $dealId]);
        (new TelegramService())->sendJsonFile($parentDeal);
        $newDeal = $parentDeal['result'];
    }
}
