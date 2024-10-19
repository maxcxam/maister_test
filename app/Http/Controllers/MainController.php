<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Http\Requests\CreateInvoiceRequest;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\User;
use App\Services\TelegramService;
use Telegram\Bot\Laravel\Facades\Telegram;
class MainController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('main', compact('users'));
    }

    public function user(User $user)
    {
        return view('user', compact('user'));
    }

    public function createInvoice(CreateInvoiceRequest $request, User $user)
    {
        $validation = $request->validate($request->customRules($user));
        $orders = Order::whereIn('id', $validation['orders'])->get();
        $total = $orders->sum('total') * config('settings.invoice_rate', 0.3);
        $invoice = new Invoice;
        $invoice->user_id = $user->id;
        $invoice->invoice_no = Invoice::generateNo();
        $invoice->state = Status::NEW;
        $invoice->total = $total;
        $invoice->save();
        foreach ($orders as $order) {
            $order->invoice_id = $invoice->id;
            $order->state = Status::IN_PROGRESS;
            $order->save();
        }
        return redirect()->route('invoice', $invoice);
    }

    public function invoice(Invoice $invoice)
    {
        $fee = config('settings.invoice_rate', 0.3);
        return view('invoice', compact('invoice', 'fee'));
    }
}
