<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomUsers;
use Auth;

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
        $userid = Auth::user()->id;

        Room::create([
            'name' => $request['roomName'],
            'maxPersons' => $request['roomMaxPersons'],
            'user_id' => $userid
        ]);
        return response()->json(['´success' => 'Raum erfolgreich erstellt.'], 200);
    }

    public function update(Request $request) {
        $userid = Auth::user()->id;

        $room = Room::where('id', $request['id'])-get('user_id');

        if($room == $userid){

            Room::where('id', $request['id'])->update([
                'name' => $request['roomName'],
                'maxPersons' => $request['roomMaxPersons'],
                'user_id' => $userid
            ]);
            return response()->json(['´success' => 'Raum erfolgreich bearbeitet.'], 200);
        }
        else
        {
            return response()->json(['error' => 'Du hast diesen Raum nicht erstellt und darfst ihn somit nicht bearbeiten'], 403);
        }

    }

    public function delete(Request $request) {
        $userid = Auth::user()->id;

        $roomid = Room::where('id', $request['id'])->get('id');

        if($room == $userid){
            Room::where('id', $request['id'])->delete();
            return response()->json(['´success' => 'Raum erfolgreich bearbeitet.'], 200);
        }
        else
        {
            return response()->json(['error' => 'Du hast diesen Raum nicht erstellt und darfst ihn somit nicht löschen'], 403);
        }
    }

    public function joinRoom(Request $request) {
        $userid = Auth::user()->id;
        $persons = RoomUsers::where('room_id', $request['room_id'])->count();
        $maxPersons = Room::where('id', $request['room_id'])->get('maxPersons');

        if($persons < $maxPersons){
            RoomUsers::create([
                'user_id' => $userid,
                'room_id' => $request['room_id']
            ]);
            return response()->json(['´success' => 'Raum erfolgreich beigetreten.'], 200);
        }
        else
        {
            return response()->json(['error' => 'Die maximale Anzahl an Personen für diesen Raum ist bereits erreicht, du kannst ihn nicht mehr beitreten.'], 403);
        }

    }

    public function leaveRoom(Request $request){
        $userid = Auth::user()->id;
        RoomUsers::where('user_id', $userid)->where('room_id', $request['room_id'])->delete();
        return response()->json(['´success' => 'Raum erfolgreich verlassen.'], 200);
    }


}

