<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Docs\RoomDocs;
use App\Models\Hotel;

class RoomController extends Controller
{
    public function index()
    {
        return response()->json(Room::with(['hotel', 'roomType', 'accommodation'])->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'room_type_id' => 'required|exists:room_types,id',
            'accommodation_id' => 'required|exists:accommodations,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $hotel = Hotel::find($request->hotel_id);

        // criterios de aceptacion
        // Validar que la cantidad de habitaciones no supere el máximo del hotel
        $total_rooms_assigned = Room::where('hotel_id', $hotel->id)->sum('quantity');

        if ($total_rooms_assigned + $request->quantity > $hotel->total_rooms) {
            return response()->json(['error' => 'La cantidad de habitaciones supera el máximo permitido para este hotel'], 400);
        }

        // Validar que no exista una combinación duplicada de room_type + accommodation en el mismo hotel
        $exists = Room::where('hotel_id', $request->hotel_id)
                    ->where('room_type_id', $request->room_type_id)
                    ->where('accommodation_id', $request->accommodation_id)
                    ->exists();

        if ($exists) {
            return response()->json(['error' => 'Este tipo de habitación y acomodación ya está asignado al hotel'], 400);
        }

        $room = Room::create($request->all());

        return response()->json($room, 201);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::with(['hotel', 'roomType', 'accommodation'])->find($id);
        return $room ? response()->json($room, 200) : response()->json(['error' => 'Habitación no encontrada'], 404);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $room = Room::find($id);
        if (!$room) {
            return response()->json(['error' => 'Habitación no encontrada'], 404);
        }

        $request->validate([
            'quantity' => 'integer|min:1'
        ]);

        $room->update($request->all());
        return response()->json($room, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        if (!$room) {
            return response()->json(['error' => 'Habitación no encontrada'], 404);
        }

        $room->delete();
        return response()->json(['message' => 'Habitación eliminada'], 200);
    }
}
