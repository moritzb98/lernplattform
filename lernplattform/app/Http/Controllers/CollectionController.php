<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Collection;
use App\Models\CollectionFiles;

class CollectionController extends Controller
{
    public function create(Request $request){
        $userid = Auth::user()->id;

        $collection = Collection::create([
            'name' => $request['name'],
            'user_id' => $userid
        ]);

        return response()->json(['´success' => 'Sammlung erfolgreich erstellt.'], 200);
    }

    public function addFile(Request $request){

        $collectionFiles = CollectionFiles::create([
            'file_id' => $request['file_id'],
            'collection_id' => $request['collection_id']
        ]);

        return response()->json(['´success' => 'Datei erfolgreich zur Sammlung hinzugefügt.'], 200);
    }
}