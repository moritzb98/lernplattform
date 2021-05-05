<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomUsers;
use App\Http\Resources\UserRoomCollection;
use Auth;
use App\Http\Controllers\ChatController;

class RoomController extends Controller
{

    public function getAllRooms() {
        return Room::all();
    }

    public function getMyRooms() {
        return Room::where('user_id', Auth::user()->id)->get();
    }

    public function getRoom($roomid) {
        return Room::where('id', $roomid)->first();
    }


    public function create(Request $request) {
        $userid = Auth::user()->id;

        $room = Room::create([
            'name' => $request['roomName'],
            'maxPersons' => $request['roomMaxPersons'],
            'user_id' => $userid
        ]);
        app('App\Http\Controllers\ChatController')->createRoom($room['id'], $room['name']);
        return response()->json(['´success' => 'Raum erfolgreich erstellt.'], 200);
    }

    public function update(Request $request) {
        $userid = Auth::user()->id;

        $room = Room::where('id', $request['id'])->first();

        if($room['user_id'] == $userid){

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
        $roomUserid = Room::where('user_id', $userid)->where('id', $roomid)->get('user_id');

        if($roomUserid == $userid){
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

    public function getUsersInRoom(Request $request){
        $roomid = $request['room_id'];
        return new UserRoomCollection(RoomUsers::where('room_id', $roomid)->get());
    }


}

