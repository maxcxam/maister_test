<?php

namespace App\Listeners;

use App\B24\CRest;
use App\Events\OnDealAddEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class OnDealAddEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OnDealAddEvent $event): void
    {
        $data = $event->data;
        $dealId = $data['data']['FIELDS']['ID'];
        $dealData = CRest::call('crm.deal.get', ['ID' => $dealId]);
        Log::info('deal info: ', ['deal' => $dealData]);
    }
}
