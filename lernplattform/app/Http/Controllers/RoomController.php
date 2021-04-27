<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function test() {
        return "Test funktioniert";
    }


    public function create(Request $request) {
        Room::create([
            'name' => $request['roomName'],
            'maxPersons' => $request['roomMaxPersons']
        ]);
        return response()->json(['´success' => 'Raum erstellt.'], 200);
    }


}
