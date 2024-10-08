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
        dd($request->customRules($user));
        $validation = $request->validate($request->customRules($user));
        if(!empty($validation)) {
            dd($validation);
        }
        dd($validation);

        $validated = $request->validated();
        $orders = Order::where('id', 'IN', $validated->orders)->get()->toArray();
        $total = array_sum(array_column($orders, 'total')) * config('settings.invoice_rate', 0.3);
        $invoice = new Invoice;
        $invoice->user_id = $user->id;
        $invoice->invoice_no = Invoice::generateNo();
        $invoice->total = $total;
        $invoice->save();
        foreach ($orders as $order) {
            $order->invoice_id = $invoice->id;
            $order->status = Status::IN_PROGRESS;
            $order->save();
        }
        return redirect()->route('invoice', $invoice);
    }
}
