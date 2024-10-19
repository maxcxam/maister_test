<?php

namespace App\Services;

use App\B24\CRest;

class BitrixTaskManager
{
    public static function createCopyDeal(int $dealId, mixed $type)
    {
        $parentDeal = CRest::call('crm.deal.get', ['id' => $dealId]);
        $contacts = CRest::call('crm.deal.contact.items.get', ['id' => $dealId]);
        (new TelegramService())->sendJsonFile([$parentDeal['result'], $contacts['result']]);
        if($type === 'A') {
            $oldTitle = $parentDeal['result']['TITLE'];
            $titleParts = explode('-', $oldTitle);
            $lastSegment = intval(array_pop($titleParts));
            if($lastSegment > 0) {
                $lastSegment++;
                $titleParts[] = $lastSegment;
                $title = implode('-', $titleParts);
            } else {
                $title = $oldTitle . '-2';
            }
        }
        $newDeal = [
            'fields' => [
                'TITLE' => $title,
                'TYPE_ID' => $parentDeal['result']['TYPE_ID'],
                'STAGE_ID' => 'NEW',
                'CONTACT_IDS' => [
                    ['ID' => $contacts['result'][0]['CONTACT_ID']]
                ],
                'IS_RECURRING' => $parentDeal['result']['IS_RECURRING'],
                'COMMENTS' => !empty($parentDeal['result']['COMMENTS']) ? $parentDeal['result']['COMMENTS'] : 'PARENT_ID='.$dealId,
                'ASSIGNED_BY_ID' => $parentDeal['result']['ASSIGNED_BY_ID'],
            ],
            'params' => [
                'REGISTER_SONET_EVENT' => 'Y'
            ]
        ];

        return CRest::call('crm.deal.add', $newDeal);

    }
}
