<?php

namespace App\Models\SnghamRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
class Member extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'user_id','sangham_id', 'position_id','effective_from','approved','approved_by_id',];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function properMember()
    {
        $array = parent::toArray(); 

        
            $array['surname'] = ucwords($this->user->surname);
            $array['username'] = ucwords($this->user->username);
            $array['name'] = ucwords($this->user->name);
            $array['position'] =$this->position->position_telugu;
            $array['avatar'] = $this->user->profile->getavatar();

        return $array;
    }
}
