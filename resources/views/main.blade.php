<x-layouts.app>
    <div class="container mx-auto">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table
                            class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                            <thead
                                class="border-b border-neutral-200 font-medium dark:border-white/10">
                            <tr>
                                <th scope="col" class="px-6 py-4">Name</th>
                                <th scope="col" class="px-6 py-4">Email</th>
                                <th scope="col" class="px-6 py-4">New</th>
                                <th scope="col" class="px-6 py-4">In process</th>
                                <th scope="col" class="px-6 py-4">Completed</th>
                                <th scope="col" class="px-6 py-4"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $index => $user)
                                <tr class="border-b border-neutral-200 dark:border-white/10">
                                    <td class="whitespace-nowrap px-6 py-4">{{$user->name}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$user->email}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$user->orders->filter(fn($order) => $order->state->equals(\App\Enums\Status::NEW))->count()}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$user->orders->filter(fn($order) => $order->state->equals(\App\Enums\Status::IN_PROGRESS))->count()}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$user->orders->filter(fn($order) => $order->state->equals(\App\Enums\Status::COMPLETED))->count()}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <a href="{{route('users.show', $user->id)}}">Go to orders</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
