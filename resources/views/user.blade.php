@extends('components.layouts.app')
@section('layout')
<div class="container mx-auto">
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <form action="{{ route('invoices.create', ['user' => $user->id]) }}" method="POST">
                        <table class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                            <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                            <tr>
                                <th scope="col" class="px-6 py-4"></th>
                                <th scope="col" class="px-6 py-4">Title</th>
                                <th scope="col" class="px-6 py-4">State</th>
                                <th scope="col" class="px-6 py-4">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->orders as $order)
                                <tr class="border-b border-neutral-200 dark:border-white/10">
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <input type="checkbox" value="{{ $order->id }}" name="orders[]"/>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $order->title }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $order->state }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $order->total }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="flex justify-center mt-5">
                                @csrf
                                <button
                                        class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-red-200 via-red-300 to-yellow-200 group-hover:from-red-200 group-hover:via-red-300 group-hover:to-yellow-200 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400"
                                        type="submit">
                                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                        Generate invoice
                                    </span>
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
