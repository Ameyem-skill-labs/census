<?php

namespace App\Http\Controllers\Twitt;

use App\Models\TweetRelated\Comment;
use App\Models\TweetRelated\Tweet;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'this_tweet_id' => 'required|exists:tweets,id',
            'for_tweet_id' => 'required|exists:tweets,id',
        ]);

        $comment = new Comment();
        $comment->body = $request->message;
        $comment->user_id = auth()->id();
        $comment->tweet_id = $request->tweet_id;
        $comment->save();

        return response()->json(['success' => true]);

        
    }

    public function index(Tweet $tweet)
    {
        $tweets = Tweet::where('type_id',1)
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->select()
                ->get();

        return response()->json(['tweets' => $tweets]);
    }

    // public function store(Tweet $tweet)
    // {
    //     // return $tweet;
    //     $tweet->likes()->firstOrCreate([
    //         'user_id' => auth()->id(),
    //     ]);

    //     return response()->json(['tweet'=>['id'=>$tweet->id,'likes'=>$tweet->likes()->count()]]);
    //     // return response()->json(['tweet'=>$tweet]);
    // }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json(['success' => true]);
    }
}