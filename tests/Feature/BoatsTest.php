<?php

namespace Tests\Feature;

use App\Models\Boats;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BoatsTest extends TestCase
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
    public function it_shows_all_of_the_boats_successfully()
    {

        Boats::factory(10)->create([
            'model' => 'Barracuda 686'
        ]);

        $response = $this->actingAs($this->user)->get('/boats');
        $response->assertStatus(200);
        $content = $response->getContent();
        $this->assertStringContainsString('Barracuda 686', $content);
    }

    /**
     * @test
     */
    public function it_creates_boat_successfully()
    {
        $params = [
            'model' => 'Atlantic Marine',
            'production_year' => 2023,
            'capacity' => 10,
            'blue_cave_private' => 300,
            'perast_private' => 100,
            'blue_cave_group' => 30,
            'price_by_hour' => 100,
            'departure_time' => '09:00h'
        ];

        $response = $this->actingAs($this->user)->post('/boats', $params);

        $response->assertRedirect();
        $this->assertDatabaseHas('boats', $params);
    }

    /**
     * @test
     */
    public function it_updates_boat_data_successfully_in_the_database()
    {
        $boat = Boats::factory()->create();

        $params = [
            'model' => 'Atlantic Marine',
            'production_year' => 2023,
            'departure_time' => '19:00h',
            'capacity' => 12,
            'blue_cave_private' => 350,
            'perast_private' => 120,
            'blue_cave_group' => 40,
            'price_by_hour' => 100,
        ];

        $this->actingAs($this->user)->put("/boats/$boat->id", $params);

        $this->assertDatabaseHas('boats', $params);
    }

    /**
     * @test
     */
    public function it_deletes_boat_data_successfully_in_the_database()
    {
        $boat = Boats::factory()->create();

        $this->actingAs($this->user)->delete("/boats/$boat->id");

        $this->assertDatabaseEmpty('boats');
        $this->assertDatabaseMissing('boats', $boat->toArray());
    }

}
