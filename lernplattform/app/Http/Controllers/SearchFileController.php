<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileUpload;
use Spatie\Searchable\Search;
use Auth;
use App\Http\Resources\UserFilesCollection;
use App\Models\CollectionFiles;

class SearchFileController extends Controller
{
        public function index(Request $request){

            $results = (new Search())->registerModel(FileUpload::class, ['displayname'])
            ->search($request->input('query'));


            return response()->json($results);
        }
    }
