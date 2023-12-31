<?php

namespace Tests\Feature;

use App\Models\Boats;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingTests extends TestCase
{

    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->withoutExceptionHandling();
        $this->user = User::factory()->create([
            'business_role' => 'company'
        ]);
    }

    /**
     * @test
     */
    public function it_shows_all_the_bookings_successfully()
    {
        Booking::factory()->create([
            'number_of_adults' => 2,
            'total_price' => 80,
            'user_id' => $this->user->id,
        ]);

        $response = $this->actingAs($this->user)->get('/booking');
        $response->assertStatus(200);
        $content = $response->getContent();
        $this->assertStringContainsString('2', $content);
        $this->assertStringContainsString('80', $content);
    }

    /**
     * @test
     */
    public function it_successfully_creates_a_booking_for_a_specific_boat()
    {
        $boat = Boats::factory()->create();

        $params = [
            'tour' => 'Blue Cave',
            'departure_time' => '09:00h',
            'number_of_adults' => 2,
            'number_of_kids' => 0,
            'number_of_infants' => 0,
            'total_price' => 80,
            'additional_message' => 'No additional message',
            'boats_id' => $boat->id,
            'user_id' => $this->user->id
        ];

        $response = $this->actingAs($this->user)->post('/booking', $params);

        $response->assertRedirect();
        $this->assertDatabaseHas('bookings', $params);
        $this->assertSame($boat->id, $params['boats_id']);
    }

    /**
     * @test
     */
    public function it_successfully_prevents_overbooking_for_a_specific_departure_time_and_boat()
    {
        $boat = Boats::factory()->create([
            'capacity' => 8,
            'departure_time' => '12:00h'
        ]);

        $params = [
            'tour' => 'Blue Cave',
            'departure_time' => '12:00h',
            'number_of_adults' => 9,
            'number_of_kids' => 0,
            'number_of_infants' => 0,
            'total_price' => 315,
            'additional_message' => 'No additional message',
            'boats_id' => $boat->id,
            'user_id' => $this->user->id
        ];

        $response = $this->actingAs($this->user)->post('/booking', $params);

        $response->assertRedirect();
        $this->assertDatabaseMissing('bookings', $params);
    }

    /**
     * @test
     */
    public function it_successfully_updates_the_boat_capcity_for_a_specific_departure_time()
    {
        $boat = Boats::factory()->create([
            'capacity' => 10,
            'departure_time' => '12:00h'
        ]);

        $params = [
            'tour' => 'Blue Cave',
            'departure_time' => '12:00h',
            'number_of_adults' => 2,
            'number_of_kids' => 0,
            'number_of_infants' => 0,
            'total_price' => 80,
            'additional_message' => 'No additional message',
            'boats_id' => $boat->id,
            'user_id' => $this->user->id
        ];

        $response = $this->actingAs($this->user)->post('/booking', $params);

        $response->assertRedirect();

        $this->assertDatabaseHas('boats', [
            'booked_capacity' => 2
        ]);
    }

    /**
     * @test
     */
    public function it_successfully_updates_the_booking_record_in_the_database()
    {
        $boat = Boats::factory()->create();
        $booking = Booking::factory()->create([
            'boats_id' => $boat->id
        ]);

        $params = [
            'tour' => 'Blue Cave',
            'departure_time' => '12:00h',
            'number_of_adults' => 2,
            'number_of_kids' => 2,
            'number_of_infants' => 0,
            'total_price' => 120,
            'additional_message' => 'They want beer on the boat',
        ];

        $this->actingAs($this->user)->put("/booking/$booking->id", $params);
        $this->assertDatabaseHas('bookings', $params);
    }

    /**
     * @test
     */
    public function it_successfully_deletes_the_booking_record_from_the_database()
    {
        $boat = Boats::factory()->create();
        $booking = Booking::factory()->create([
            'boats_id' => $boat->id
        ]);

        $this->actingAs($this->user)->delete("/booking/$booking->id");

        $this->assertDatabaseEmpty('bookings');
        $this->assertDatabaseMissing('bookings', $booking->toArray());
    }

}
