<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserFollowController extends Controller
{
    public function followers()
    {
        $user = auth()->user();
        $followers = $user->followers;
        return view('followers', compact('followers'));
    }

    public function following()
    {
        $user = auth()->user();
        $following = $user->following;
        return view('following', compact('following'));
    }

    public function follow(User $user)
    {
        auth()->user()->following()->attach($user->id);
        return back();
    }

    public function unfollow(User $user)
    {
        auth()->user()->following()->detach($user->id);
        return back();
    }
}
