<x-layouts.app>
<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow-sm my-6" id="invoice">
    <div class="grid grid-cols-2 items-center">
        <div>
            <!--  Company logo  -->
            <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg" alt="company-logo" height="100" width="100">
        </div>
    </div>

    <!-- Client info -->
    <div class="grid grid-cols-2 items-center mt-8">
        <div>
            <p class="font-bold text-gray-800">
                Bill to :
            </p>
            <p class="text-gray-500">
                {{$invoice->user->name}}
            </p>
            <p class="text-gray-500">
                {{$invoice->user->email}}
            </p>
        </div>

        <div class="text-right">
            <p class="">
                Invoice number:
                <span class="text-gray-500">{{$invoice->invoice_no}}</span>
            </p>
            <p>
                Invoice date: <span class="text-gray-500">{{$invoice->created_at}}</span>
            </p>
        </div>
    </div>

    <!-- Invoice Items -->
    <div class="-mx-4 mt-8 flow-root sm:mx-0">
        <table class="min-w-full">
            <colgroup>
                <col class="w-full sm:w-1/2">
                <col class="sm:w-1/6">
                <col class="sm:w-1/6">
                <col class="sm:w-1/6">
            </colgroup>
            <thead class="border-b border-gray-300 text-gray-900">
            <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Title</th>
                <th scope="col" class="hidden px-3 py-3.5 text-right text-sm font-semibold text-gray-900 sm:table-cell"></th>
                <th scope="col" class="hidden px-3 py-3.5 text-right text-sm font-semibold text-gray-900 sm:table-cell">Order fee</th>
                <th scope="col" class="hidden px-3 py-3.5 text-right text-sm font-semibold text-gray-900 sm:table-cell">Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($invoice->orders as $order)
                <tr class="border-b border-gray-200">
                    <td class="max-w-0 py-5 pl-4 pr-3 text-sm sm:pl-0">
                        <div class="font-medium text-gray-900">{{$order->title}}</div>
                    </td>
                    <td class="py-5 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-0"></td>
                    <td class="py-5 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-0">${{$order->total * config('settings.invoice_rate', 0.3)}}</td>
                    <td class="py-5 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-0">${{$order->total}}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th scope="row" colspan="3" class="hidden pl-4 pr-3 pt-4 text-right text-sm font-semibold text-gray-900 sm:table-cell sm:pl-0">Total</th>
                <td class="pl-3 pr-4 pt-4 text-right text-sm font-semibold text-gray-900 sm:pr-0">${{$invoice->total}}</td>
            </tr>
            </tfoot>
        </table>
    </div>

    <!--  Footer  -->
    <div class="border-t-2 pt-4 text-xs text-gray-500 text-center mt-16">
        Please pay the invoice before the due date. You can pay the invoice by logging in to your account from our client portal.
    </div>

</div>
</x-layouts.app>
