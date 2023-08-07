<?php

namespace App\Models\TweetRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Mention extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','tweet_id'];

    public function tweets()
    {
        return $this->belongsToMany(Tweet::class, 'tweet_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_id');
    }
}