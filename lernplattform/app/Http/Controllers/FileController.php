<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileUpload;
use Auth;
use App\Http\Resources\UserFilesCollection;
use App\Models\CollectionFiles;

class FileController extends Controller
{
        public function index(){
                return new UserFilesCollection(FileUpload::all());
        }

        public function showFile($id){
            return FileUpload::find($id);
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
            $files =  new CollFilesCollection(CollectionFiles::where('collection_id', $request['collection_id'])->get());
            return $files;
        }

}
