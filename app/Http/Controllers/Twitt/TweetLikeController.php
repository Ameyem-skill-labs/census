<?php

namespace App\Http\Controllers\Twitt;

use App\Http\Controllers\Controller;
use App\Models\TweetRelated\Like;
use Illuminate\Http\Request;
use App\Models\TweetRelated\Tweet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use App\User;

class TweetLikeController extends Controller
{

        public function store(Tweet $tweet)
        {
            // return $tweet;
            $tweet->likes()->firstOrCreate([
                'user_id' => auth()->id(),
            ]);

            return response()->json(['tweet'=>['id'=>$tweet->id,'likes'=>$tweet->likes()->count()]]);
            // return response()->json(['tweet'=>$tweet]);
        }

    public function destroy(Like $like)
    {
        //
    }
}
