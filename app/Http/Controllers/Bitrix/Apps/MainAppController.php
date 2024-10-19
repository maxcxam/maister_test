<?php

namespace App\Http\Controllers\Bitrix\Apps;

use App\B24\CRest;
use App\Events\OnDealAddEvent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class MainAppController extends Controller
{
    public function install(Request $request)
    {
        $result = CRest::installApp();
        Log::info('install: Request was handled', ['result'=>$result]);
        return view('bitrix.apps.index', compact('result'));
    }

    public function handler(Request $request)
    {
        Log::info('handler: Request was handled', ['request' => $request->all(), 'result'=>'ok']);
        $result = $request->all();
        $event = array_key_exists('event', $result) ? $result['event'] : null;
        match ($event) {
            'ONCRMDEALADD' => OnDealAddEvent::dispatch($result),
            default => null
        };
        Log::emergency('handler: Event ' .$event. ' was handled');
        return view('bitrix.apps.handler', compact('result'));
    }
}
