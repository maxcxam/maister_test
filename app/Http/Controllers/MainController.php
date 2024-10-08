<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Http\Requests\CreateInvoiceRequest;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\User;

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
        $total = array_sum(array_column($orders->toArray(), 'total')) * config('settings.invoice_rate', 0.3);
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
        dd($invoice);
    }
}
