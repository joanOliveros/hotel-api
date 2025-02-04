<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Docs\HotelDocs;


class HotelController extends Controller
{

    public function index()
    {
        return response()->json(Hotel::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:hotels|max:255',
            'address' => 'required',
            'city' => 'required',
            'nit' => 'required|unique:hotels',
            'total_rooms' => 'required|integer|min:1'
        ]);

        $hotel = Hotel::create($request->all());
        return response()->json($hotel, 201);
    }

    public function show($id)
    {
        $hotel = Hotel::find($id);
        return $hotel
                ? response()->json($hotel, 200)
                : response()->json(['error' => 'Hotel no encontrado'], 404);
    }


    public function update(Request $request, $id)
    {
        $hotel = Hotel::find($id);
        if (!$hotel) {
            return response()->json(['error' => 'Hotel no encontrado'], 404);
        }

        $request->validate([
            'name' => ['sometimes', Rule::unique('hotels')->ignore($hotel->id)],
            'nit' => ['sometimes', Rule::unique('hotels')->ignore($hotel->id)],
            'total_rooms' => 'integer|min:1'
        ]);

        $hotel->update($request->all());
        return response()->json($hotel, 200);
    }

    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        if(!$hotel){
            return response()->json(['error' => 'Hotel no encontrado'], 404);
        }

        $hotel->delete();
        return response()->json(['message' => 'Hotel elimando'], 200);
    }
}
