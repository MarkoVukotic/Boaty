<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Boats>
 */
class BoatsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::factory()->create();
        return [
            'model' => 'Atlantic Marine',
            'production_year' => 2023,
            'capacity' => 10,
            'blue_cave_private' => 300,
            'perast_private' => 100,
            'blue_cave_group' => 30,
            'price_by_hour' => 100,
            'user_id' => $user->id
        ];
    }
}
