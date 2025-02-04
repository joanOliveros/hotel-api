<?php

namespace Tests\Feature;

use App\Models\Hotel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HotelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_obtener_lista_de_hoteles()
    {
        Hotel::factory()->create();

        $response = $this->getJson('/api/hotels');

        $response->assertStatus(200)
                ->assertJsonStructure(([
                    '*' => ['id', 'name', 'address', 'city', 'nit', 'total_rooms']
                ]));
    }

    /** @test */
    public function puede_crear_un_hotel()
    {
        $data = [
            "name" => "Hotel Test",
            "address" => "Calle 123",
            "city" => "Bogotá",
            "nit" => "123456789",
            "total_rooms" => 50
        ];

        $response = $this->postJson('/api/hotels', $data);

        $response->assertStatus(201)
                ->assertJsonFragment(["name" => "Hotel Test"]);
    }
}
