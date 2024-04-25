<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TicketFactory extends Factory
{
    protected $model = Ticket::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->title,
            'email' => $this->faker->unique()->safeEmail(),
            'reference' => "ACT" . random_int(100001, 199999),
            'description' => $this->faker->text(),
            'department_id' => random_int(1,6),
            'opened_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
