<?php

namespace Database\Factories;

use App\Models\Boats;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::factory()->create();
        $boats = Boats::factory()->create(['departure_time' => '09:00h']);
        return [
            'number_of_adults' => 2,
            'number_of_kids' => 0,
            'number_of_infants' => 0,
            'total_price' => 80,
            'departure_time' => '09:00h',
            'additional_message' => '',
            'tour' => 'Blue cave',
            'status' => 'active',
            'user_id' => $user->id,
            'boats_id' => $boats->id
        ];
    }
}
