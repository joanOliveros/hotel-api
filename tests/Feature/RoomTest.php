<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Accommodation;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoomTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_una_habitacion_si_todo_es_valido()
    {

        $hotel = Hotel::factory()->create(['total_rooms' => 50]);

        $roomType = RoomType::factory()->create();
        $accommodation = Accommodation::factory()->create(['room_type_id' => $roomType->id]);

        $response = $this->postJson('/api/rooms', [
            'hotel_id' => $hotel->id,
            'room_type_id' => $roomType->id,
            'accommodation_id' => $accommodation->id,
            'quantity' => 10
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('rooms', ['hotel_id' => $hotel->id, 'quantity' => 10]);
    }

    /** @test */
    public function no_puede_crear_una_habitacion_si_supera_el_maximo_del_hotel()
    {
        $hotel = Hotel::factory()->create(['total_rooms' => 5]);

        $roomType = RoomType::factory()->create();
        $accommodation = Accommodation::factory()->create(['room_type_id' => $roomType->id]);

        $response = $this->postJson('/api/rooms', [
            'hotel_id' => $hotel->id,
            'room_type_id' => $roomType->id,
            'accommodation_id' => $accommodation->id,
            'quantity' => 10
        ]);

        $response->assertStatus(400);
        $response->assertJson(['error' => 'La cantidad de habitaciones supera el máximo permitido para este hotel']);
    }

    /** @test */
    public function no_puede_crear_una_habitacion_si_ya_existe_la_misma_combinacion()
    {
        $hotel = Hotel::factory()->create(['total_rooms' => 50]);
        $roomType = RoomType::factory()->create();
        $accommodation = Accommodation::factory()->create(['room_type_id' => $roomType->id]);

        Room::factory()->create([
            'hotel_id' => $hotel->id,
            'room_type_id' => $roomType->id,
            'accommodation_id' => $accommodation->id,
            'quantity' => 5
        ]);

        $response = $this->postJson('/api/rooms', [
            'hotel_id' => $hotel->id,
            'room_type_id' => $roomType->id,
            'accommodation_id' => $accommodation->id,
            'quantity' => 5
        ]);

        $response->assertStatus(400);
        $response->assertJson(['error' => 'Este tipo de habitación y acomodación ya está asignado al hotel']);
    }
}
