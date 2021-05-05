<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FileUpload;
use Auth;
use App\Http\Resources\UserFilesCollection;

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
                $fileUpload->save();

                return response()->json(['success'=>'Datei erfolgreich hochgeladen']);
            }
       }

       public function showUserFiles(){
           return new UserFilesCollection(FileUpload::where('user_id', Auth::user()->id)->get());
       }

}
