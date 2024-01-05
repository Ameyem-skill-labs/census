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
use Illuminate\Support\Str;
// use App\Models\MatrimonyUsers;

class User extends Authenticatable implements JWTSubject
// class User extends Authenticatable
{
    use Notifiable, HasFactory;

    protected $fillable = ['surname','name','username', 'email','mobile','password',
    'date_of_birth', 'sex', 'marriage_status', 'blood_group', 'education', 'occupation',
     'role_id', 'username','position','admin','editing_village_id','place_id', 'place_table_name','is_approved', 'approved_by_id']; //'currency_id',

     protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function toCustomArray()
    {
        // Get the default array representation of the user
        $array = $this->toArray();

        // Add additional details
        $array['place'] = $this->getAddress();
        // $array['avatar'] = $this->profile ? $this->profile->getAvatar() : 'default-avatar-path';

        return $array;
    }

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

    public function getAddress()
    {
        $placeTableName = $this->place_table_name;
        $placeId = $this->place_id;

        // Dynamically determine the model class based on the table name
        $modelClass = '\\App\\Models\\PlaceRelated\\' . Str::studly($placeTableName);

        if (!class_exists($modelClass)) {
            return 'Model not found';
        }

        // Fetch the place model instance
        $place = $modelClass::find($placeId);

        if (!$place) {
            return 'Place not found';
        }

        // Call the getAddress method on the place model
        return $place->getAddress();
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
