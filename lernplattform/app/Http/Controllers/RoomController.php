<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{

    public function getAllRooms() {
        $rooms = Room::get();
        return $rooms;
    }

    public function getRoom(Request $request) {
        return null;
    }


    public function create(Request $request) {
        Room::create([
            'name' => $request['roomName'],
            'maxPersons' => $request['roomMaxPersons']
        ]);
        return response()->json(['´success' => 'Raum erfolgreich erstellt.'], 200);
    }

    public function update(Request $request) {
        Room::where('id', $request['id'])->update([
            'name' => $request['roomName'],
            'maxPersons' => $request['roomMaxPersons']
        ]);
        return response()->json(['´success' => 'Raum erfolgreich bearbeitet.'], 200);
    }


}
