<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileUpload;
use App\Models\Room;
use App\Models\Collection;
use App\Models\Quiz;
use App\Models\Karteikartenset;
use App\Models\User;
use Spatie\Searchable\Search;
use Auth;
use App\Http\Resources\UserFilesCollection;
use App\Models\CollectionFiles;

class SearchFileController extends Controller
{
        public function index(Request $request){

            $results = (new Search())->registerModel(FileUpload::class, ['displayname'])->registerModel(Quiz::class, ['name'])->registerModel(Room::class, ['name'])
            ->registerModel(Collection::class, ['name'])->registerModel(User::class, ['name'])
            ->search($request->input('query'));


            return response()->json($results);
        }
    }
