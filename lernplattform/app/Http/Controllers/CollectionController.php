<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Collection;

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
}
