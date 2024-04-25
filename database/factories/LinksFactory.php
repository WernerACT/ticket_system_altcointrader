<?php

namespace Database\Factories;

use App\Models\Links;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LinksFactory extends Factory
{
    protected $model = Links::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'url' => $this->faker->url(),
        ];
    }
}
