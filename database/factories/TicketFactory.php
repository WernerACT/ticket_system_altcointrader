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
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'email' => $this->faker->unique()->safeEmail(),
            'reference' => $this->faker->word(),
            'description' => $this->faker->text(),
            'opened_at' => Carbon::now(),
        ];
    }
}
