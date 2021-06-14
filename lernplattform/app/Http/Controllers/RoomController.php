<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomsUsers;
use App\Models\ChatRoom;
use App\Http\Resources\UserRoomCollection;
use Auth;
use App\Http\Controllers\ChatController;
use App\Http\Resources\RoomCollection;

class RoomController extends Controller
{

    public function getAllRooms() {
        return [Room::all(), Auth::user()->id];
        //return [new RoomCollection(Room::all()), Auth::user()->id];
    }

    public function getMyRooms() {
        //return Room::where('user_id', Auth::user()->id)->get();
        return new RoomCollection(Room::where('user_id', Auth::user()->id)->get());
    }

    public function getRoom($roomid) {
        //return Room::where('id', $roomid)->first();
        return new RoomCollection(Room::where('id', $roomid)->get());
    }


    public function create(Request $request) {
        $userid = Auth::user()->id;

        $room = Room::create([
            'name' => $request['roomName'],
            'maxPersons' => $request['roomMaxPersons'],
            'user_id' => $userid,
            'category_id' => $request['category_id'],
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

    public function delete($id) {

        $userid = Auth::user()->id;
        $room = Room::where('id', $id)->first();

        if($room->user_id == $userid){
            ChatRoom::where('room_id', $id)->delete();
            RoomsUsers::where('room_id', $id)->delete();
            Room::where('id', $id)->delete();
            return response()->json(['´success' => 'Raum erfolgreich gelöscht.'], 200);
        }
        else
        {
            return response()->json(['error' => 'Du hast diesen Raum nicht erstellt und darfst ihn somit nicht löschen'], 403);
        }
    }

    public function joinRoom($roomid) {
        $userid = Auth::user()->id;
        $persons = RoomsUsers::where('room_id', $roomid)->count();
        $maxPersons = Room::where('id', $roomid)->first();
        $userInRoom = RoomsUsers::where('room_id', $roomid)->where('user_id', $userid)->first();

        if($persons < $maxPersons['maxPersons']){
            if($userInRoom === null) {
                RoomsUsers::create([
                    'user_id' => $userid,
                    'room_id' => $roomid
                ]);
                return response()->json(['´success' => 'Raum erfolgreich beigetreten.'], 200);
            } else {
                return response()->json(['error' => 'Du bist diesem Raum schon beigetreten.'], 403);
            }
        }
        else
        {
            return response()->json(['error' => 'Die maximale Anzahl an Personen für diesen Raum ist bereits erreicht, du kannst ihn nicht mehr beitreten.'], 403);
        }
    }

    public function leaveRoom($roomid){

        $userid = Auth::user()->id;
        $room = Room::where('user_id', $userid)->where('id', $roomid)->first();

        if(!isset($room->user_id)){
            RoomsUsers::where('room_id', $roomid)->where('user_id', $userid)->delete();
            return response()->json(['´success' => 'Raum erfolgreich verlassen.'], 200);
        }else{
            return response()->json(['error' => 'Du hast diesen Raum  erstellt und darfst ihn somit nicht verlassen'], 403);
        }
    }

    public function getUsersInRoom(Request $request){
        $roomid = $request['room_id'];
        return new UserRoomCollection(RoomsUsers::where('room_id', $roomid)->get());
    }

    public function getRoomsUserIsIn(){
        $userid = Auth::user()->id;
        return new UserRoomCollection(RoomsUsers::where('user_id', $userid)->get());
    }



}

