<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karteikartenset;
use App\Models\KarteSets;
use Auth;
use App\Http\Resources\KarteikartensetCollection;

class Karteikartensetcontroller extends Controller
{
        public function create(Request $request){

            $userid = Auth::user()->id;
            $karteikartenset = Karteikartenset::create([
                'name' => $request['name'],
                'user_id' => $userid,
                'category_id' => $request['category_id']

            ]);

            return $karteikartenset['id'];
        }


        public function update(Request $request) {

            $userid = Auth::user()->id;

            $karteikartenset = Karteikartenset::where('id', $request['id'])->first();

            if($karteikartenset['user_id'] == $userid){
                Karteikarte::where('id', $request['id'])->update([
                    'name' => $request['name'],
                    'user_id' => $userid,
                ]);
                return response()->json(['´success' => 'Karteikartenset erfolgreich bearbeitet.'], 200);
            }
            else
            {
                return response()->json(['error' => 'Du hast diese Karteikartenset nicht erstellt und darfst es somit nicht bearbeiten'], 403);
            }

        }


        public function delete($id) {

            $userid = Auth::user()->id;
            $karteikartenset = Karteikartenset::where('id', $id)->first();

            if($karteikartenset->user_id == $userid){
                KarteSets::where('room_id', $id)->delete();
                Karteikartenset::where('id', $id)->delete();
                return response()->json(['´success' => 'Karteikartenset erfolgreich gelöscht.'], 200);
            }
            else
            {
                return response()->json(['error' => 'Du hast diese Karteikartenset nicht erstellt und darfst sie somit nicht löschen'], 403);
            }
        }

        public function getSets() {
            $userid = Auth::user()->id;
            $karteikartenset = new KarteikartensetCollection(Karteikartenset::where('user_id', $userid)->get());
            return $karteikartenset;
        }

        public function getSet($id) {
            return new KarteikartensetCollection(Karteikartenset::where('id', $id)->get());
        }
    }
