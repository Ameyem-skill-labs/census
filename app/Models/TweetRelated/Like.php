<?php
namespace App\Models\TweetRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
class Like extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','tweet_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tweet()
    {
        return $this->belongsTo(Tweet::class);
    }
}
