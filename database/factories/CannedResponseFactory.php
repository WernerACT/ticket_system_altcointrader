<?php

namespace Database\Factories;

use App\Models\CannedResponse;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CannedResponseFactory extends Factory
{
    protected $model = CannedResponse::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'keywords' => $this->faker->words(),
            'body' => $this->faker->word(),
        ];
    }
}
