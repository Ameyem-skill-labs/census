<?php

namespace App\Models\ProfileRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\ProfilesRelated\ProfessionCategory;
use App\Models\PlaceRelated\Village;
use App\Models\ProfileRelated\Qualification;
use Illuminate\Support\Facades\DB;
class Profile extends Model
{
    protected $fillable = [
        'user_id',   
        'gender',     
        'avatar',                
        'marriage_status',
        'about',
        'mobile',
        'date_of_birth',        
        'education_id',
        'profession_id',
        'role_id',
        'native_place_id',
        'present_place_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function role()
{
    return $this->belongsTo(Role::class);
}

    public function education()
    {
        return $this->belongsTo(Qualification::class);
    }

    public function profession()
    {
        return $this->belongsTo(AllProfession::class);
    }

    public function getavatar()
    {
        if ($this->avatar) {
            return asset($this->avatar);
        } else {
            return  asset('images/avatar/dummy.webp');
        }
    }
    
    
    public function nativePlace()
    {
        return $this->belongsTo(Village::class, 'native_place_id');
    }

    public function presentPlace()
{
    return $this->belongsTo(Village::class, 'present_place_id');
}
    public function getNativePlace()
    {
        // return 
        // $this->nativePlace->name.', \n'.$this->nativePlace->mandal->name.' (M), \n'.
        //                         $this->nativePlace->mandal->district->name.' (D)';

        if ($this->nativePlace) {
            return $this->nativePlace->name . ', \n' . $this->nativePlace->mandal->name . ' (M), \n' . $this->nativePlace->mandal->district->name . ' (D)';
        } else {
            return 'Not available';
        }
    }
    public function getPresentPlace()
     {        
        if ($this->presentPlace) {
            return $this->presentPlace->name.'\n'.$this->presentPlace->mandal->name.' (M), \n'.
            $this->presentPlace->mandal->district->name.' (D) ';
        } else {
            return 'Not available';
        }
    }

    public static function getStatusEnumValues($field)
    {
        // return "SHOW COLUMNS FROM profiles WHERE Field = '{$field}'";
        $type = DB::select(DB::raw("SHOW COLUMNS FROM profiles WHERE Field = '{$field}'"))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach (explode(',', $matches[1]) as $value) {
            $v = trim($value, "'");
            $enum[] = $v;
        }
        return $enum;
    }

    public function toArray()
    {
        $array = parent::toArray(); 
        $array['surname'] = ucwords($this->user->surname);
        $array['name'] = ucwords($this->user->name);
        $array['username'] = $this->user->username;
        $array['mobile'] = $this->user->mobile;
        $array['email'] = $this->user->email;

        $array['native_place'] = $this->getNativePlace();
        $array['work_place'] = $this->getPresentPlace();
        if ($this->education) {
            $array['education'] = $this->education->name;
        } else {
            $array['education'] = 'Not available';
        }
        if ($this->profession) {
            $array['profession'] = $this->profession->name;
        } else {
            $array['profession'] = 'Not available';
        }
        // Adding the role
        if ($this->role) {
            $array['role'] = $this->role->name; // Assuming 'name' is a field in the Role model
        } else {
            $array['role'] = 'Not available';
        }



        $array['avatar']=$this->getavatar();

        // $array['cover_photo'] =asset($this->cover_photo);
        

        return $array;
    }
}
