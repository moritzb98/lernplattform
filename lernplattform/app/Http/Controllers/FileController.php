<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileUpload;
use Spatie\Searchable\Search;
use Auth;
use App\Http\Resources\UserFilesCollection;
use App\Http\Resources\CollFilesCollection;
use App\Models\CollectionFiles;

class FileController extends Controller
{
        public function index(){
                return new UserFilesCollection(FileUpload::all());
        }

        public function showFile($id){
            $file = FileUpload::find($id);
            $file->date = $file->created_at->format('d-m-Y');
            return $file;
        }

        public function upload(Request $request){

                $request->validate([
                    'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
                ]);

                $fileUpload = new FileUpload;

                if($request->file()) {
                    $file_name = time().'_'.$request->file->getClientOriginalName();
                    $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');

                    $request->file->move(public_path('upload'), $file_name);

                    $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
                    $fileUpload->path = '/storage/' . $file_path;
                    $fileUpload->user_id = Auth::user()->id;
                    $fileUpload->displayname = $request->file->getClientOriginalName();
                    $fileUpload->category_id = 1;
                    $fileUpload->save();

                    return response()->json(['success'=>'Datei erfolgreich hochgeladen']);
                }
        }

        public function update(Request $request){
            //$file = FileUpload::where('id', $request['id'])->first();
            FileUpload::where('id', $request['id'])->update([
                'displayname' => $request['displayname'],
            ]);
        }

        public function showUserFiles(){
            return new UserFilesCollection(FileUpload::where('user_id', Auth::user()->id)->get());
        }

        public function showFilesInCollection(Request $request){
            $files =  new CollFilesCollection(CollectionFiles::where('collection_id', $request['id'])->get());
            return $files;
        }

        public function showCollectionsToFile(Request $request){
            $files =  new CollFilesCollection(CollectionFiles::where('file_id', $request['file_id'])->get());
            dd($files);
            return $files;
        }

        public function delete(Request $request){
            $userid = Auth::user()->id;
            CollectionFiles::where('file_id', $request['id'])->delete();
            FileUpload::where('id', $request['id'])->delete();
            return response()->json(['´success' => 'Raum erfolgreich bearbeitet.'], 200);

        }


}
