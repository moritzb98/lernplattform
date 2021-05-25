<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\QuizresultsUser;
use App\Models\BadgesUser;

class BadgeController extends Controller
{


    public function checkBadges(){
        $results = QuizresultsUser::where('user_id', Auth::user()->id)->where('passed', true)->get();
        $numberOfPassedQuiz = count($results);

        switch ($numberOfPassedQuiz) {
            case ($numberOfPassedQuiz >= 85):
                // Experte
                BadgesUser::updateOrCreate(
                    [
                        'user_id' => Auth::user()->id,
                        'badge_id' => 5,
                    ],
                    [
                        'user_id' => Auth::user()->id,
                        'badge_id' => 5,
                        'achieved' => true,
                    ]);
                break;
            case ($numberOfPassedQuiz < 85 && $numberOfPassedQuiz >= 50):
                // Kenner
                BadgesUser::updateOrCreate(
                    [
                        'user_id' => Auth::user()->id,
                        'badge_id' => 4,
                    ],
                    [
                        'user_id' => Auth::user()->id,
                        'badge_id' => 4,
                        'achieved' => true,
                    ]);
                break;
            case ($numberOfPassedQuiz < 50 && $numberOfPassedQuiz >= 25):
                // Fortgeschritten
                BadgesUser::updateOrCreate(
                    [
                        'user_id' => Auth::user()->id,
                        'badge_id' => 3,
                    ],
                    [
                        'user_id' => Auth::user()->id,
                        'badge_id' => 3,
                        'achieved' => true,
                    ]);
                break;
            case ($numberOfPassedQuiz < 25 && $numberOfPassedQuiz >= 15):
                // Beginner
                BadgesUser::updateOrCreate(
                    [
                        'user_id' => Auth::user()->id,
                        'badge_id' => 2,
                    ],
                    [
                        'user_id' => Auth::user()->id,
                        'badge_id' => 2,
                        'achieved' => true,
                    ]);
                break;
            case ($numberOfPassedQuiz < 15 && $numberOfPassedQuiz >= 5):
                // Amateur
                BadgesUser::updateOrCreate(
                    [
                        'user_id' => Auth::user()->id,
                        'badge_id' => 1,
                    ],
                    [
                        'user_id' => Auth::user()->id,
                        'badge_id' => 1,
                        'achieved' => true,
                    ]);
                break;
            default:
                // Kein Badge
                break;
          };
    }

    public function getBadges(){
        return QuizresultsUser::where('user_id', Auth::user()->id)->get();
    }
}
