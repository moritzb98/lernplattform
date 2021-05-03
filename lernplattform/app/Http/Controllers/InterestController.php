<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interest;
use App\Models\InterestsUser;
use Auth;

class InterestController extends Controller
{
    public function getAllInterest() {
        return Interest::all();
    }

    public function sendToUser(Request $request){
        $interests = $request->all();
        $userid = Auth::user()->id;
        for($i=0; $i<count($interests);$i++){
            $interestId = Interest::where('name', $interests[$i])->get();
            InterestsUser::create([
                'user_id' => $userid,
                'interest_id' => $interestId[0]['id']
            ]);
        }
    }
}
