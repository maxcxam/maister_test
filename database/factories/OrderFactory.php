<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        $users = User::all()->pluck('id');
        return [
            'title' => $this->faker->word(),
            'state' => 'new',
            'total' => $this->faker->randomFloat(2, 10, 1000),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'user_id' => $users->random(),
            'invoice_id' => NULL,
        ];
    }
}
