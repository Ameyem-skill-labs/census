<?php
namespace App\Models\TweetRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
class Retweet extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','for_tweet_id','this_tweet_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tweet()
    {
        return $this->belongsTo(Tweet::class,'this_tweet_id');
    }
    public function toArray()
    {
        $tweet = $this->tweet->toArray(); 
        $tweet ['for_tweet_id']=$this->for_tweet_id;
        return $tweet;
    }
}
