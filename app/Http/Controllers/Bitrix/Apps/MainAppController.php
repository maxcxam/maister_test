<?php

namespace App\Http\Controllers\Bitrix\Apps;

use App\B24\CRest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class MainAppController extends Controller
{
    public function install()
    {
        $result = CRest::installApp();
        return view('bitrix.apps.index', compact('result'));
    }

    public function handler(Request $request)
    {
        Log::info('Request was handled', ['request' => $request->all(), 'result'=>'ok']);
        return response()->json(['request' => $request->all(), 'result'=>'ok']);
    }
}
