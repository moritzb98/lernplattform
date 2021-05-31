<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getAll(){
        return Category::all();
    }

    public function getCategory($id){
        return Category::where('id', $id)->first();
    }
}
