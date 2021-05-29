<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karteikarte;

class Karteikartencontroller extends Controller
{
    public function create(Request $request){

        $userid = Auth::user()->id;
        $karteikarte = Karteikarte::create([
            'frontside' => $request['frontside'],
            'backside' => $request['backside'],
            'user_id' => $userid,
            'set_id' => $set_id,
        ]);

        return response()->json(['success'=>'Karteikarte erfolgreich erstellt'], 200);
        }



        public function update(Request $request) {

            $userid = Auth::user()->id;

            $karteikarte = Karteikarte::where('id', $request['id'])->first();

            if($karteikarte['user_id'] == $userid){
                Karteikarte::where('id', $request['id'])->update([
                    'frontside' => $request['frontside'],
                    'backside' => $request['backside'],
                    'user_id' => $userid,
                    'set_id' => $set_id,
                ]);
                return response()->json(['´success' => 'Karteikarte erfolgreich bearbeitet.'], 200);
            }
            else
            {
                return response()->json(['error' => 'Du hast diese Karteikarte nicht erstellt und darfst sie somit nicht bearbeiten'], 403);
            }

        }
        public function delete($id) {

            $userid = Auth::user()->id;
            $karteikarte = Karteikarte::where('id', $id)->first();

            if($karteikarte->user_id == $userid){
                Karteikarte::where('id', $id)->delete();
                return response()->json(['´success' => 'Karteikarte erfolgreich gelöscht.'], 200);
            }
            else
            {
                return response()->json(['error' => 'Du hast diese Karteikarte nicht erstellt und darfst sie somit nicht löschen'], 403);
            }
        }

}

