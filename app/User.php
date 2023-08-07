<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\ResetPassword;
use Hash;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use App\Models\ProfileRelated\Profile;

class User extends Authenticatable implements JWTSubject
// class User extends Authenticatable
{
    use Notifiable, HasFactory;
    protected $fillable = ['surname','name','username', 'email','mobile','password',
     'role_id', 'username','position','admin','editing_village_id']; //'currency_id',
     protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function sendPasswordResetNotification($token)
    {
       $this->notify(new ResetPassword($token));
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function retweets()
    {
        return $this->hasMany(Retweet::class);
    }

    public function allTweets()
    {
        return Tweet::whereIn('user_id', $this->follows()->pluck('following_id')->push($this->id))
                    ->orWhereIn('id', $this->retweets()->pluck('tweet_id'))
                    ->with('user')
                    ->latest()
                    ->paginate(10);
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'following_id', 'follower_id');
    }

    public function mentionedIn()
    {
        return $this->belongsToMany(Tweet::class, 'mentions');
    }

    // public function getavatar()
    // {
    //     $this->profile->
    //     // if ($this->profile->avatar) {
    //     //     $array['avatar'] =asset($this->profile->avatar);
    //     // } else {
    //     //     $array['avatar'] = asset('images/avatar/dummy.webp');
    //     // }
    // }

    public function properUser()
    {
        $array = parent::toArray(); 
        // if ($this->profile->cover_photo) {
        //     $array['cover_photo'] = $this->profile->cover_photo;
        // } else {
        //     $array['cover_photo'] = asset('images/1679701536.jpg'); asset('images/avatar/dummy.webp');
        // }
        // if ($this->profile->avatar) {
        //     $array['avatar'] =asset($this->profile->avatar);
        // } else {
        //     $array['avatar'] = asset('images/avatar/dummy.webp');
        // }
        $array['avatar']=$this->profile->getavatar();
        return $array;
    }
    
}
