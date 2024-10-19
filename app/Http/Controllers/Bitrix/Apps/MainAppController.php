<?php

namespace App\Http\Controllers\Bitrix\Apps;

use App\B24\CRest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class MainAppController extends Controller
{
    public function install(Request $request)
    {
        $result = CRest::installApp();
        Log::info('Request was handled', ['request' => $request->all(), 'result'=>'ok']);
        return view('bitrix.apps.index', compact('result'));
    }

    public function handler(Request $request)
    {
        Log::info('Request was handled', ['request' => $request->all(), 'result'=>'ok']);
        $result = $request->all();
        return view('bitrix.apps.handler', compact('result'));
    }
}
