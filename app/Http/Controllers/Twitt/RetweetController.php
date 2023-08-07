<?php

namespace App\Http\Controllers\Twitt;

use App\Http\Controllers\Controller;
use App\Models\TweetRelated\Retweet;
use Illuminate\Http\Request;
use App\Models\TweetRelated\Tweet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class RetweetController extends Controller
{

    // public function store(Request $request)
    // {

    //         $tweet->retweets()->firstOrCreate([
    //             'user_id' => auth()->id(),
    //         ]);
    
    //         return response()->json(['success' => true]);

    // }

    public function store(Tweet $tweet)
        {
            // return $tweet;
            $tweet->retweets()->firstOrCreate([
                'user_id' => auth()->id(),
            ]);
            return response()->json(['tweet'=>['id'=>$tweet->id,'retweets'=>$tweet->retweets()->count()]]);

        }

    public function destroy(Retweet $retweet)
    {
        //
    }
}
