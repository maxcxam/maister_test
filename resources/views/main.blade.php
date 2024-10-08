<ul>


@foreach($users as $user)
    <li>{{$user->name}}:
        orders(
        new: {{$user->orders->filter(fn($order) => $order->state->equals(\App\Enums\Status::NEW))->count()}};
        in process: {{$user->orders->filter(fn($order) => $order->state->equals(\App\Enums\Status::IN_PROGRESS))->count()}};
        completed: {{$user->orders->filter(fn($order) => $order->state->equals(\App\Enums\Status::COMPLETED))->count()}};
        )
    </li>
@endforeach

</ul>
