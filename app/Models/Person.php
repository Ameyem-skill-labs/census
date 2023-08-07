<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use DB;

class Person extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'id','intiperu','peru','father_husb_name','gender','dob','edu_qualification_id','profession_id',
        'village_id','ward_no','house_no',
        'own_a_house','own_agri_land','land_area','vehicle_type_id',
        'mobile','aadhaar','ration_card','pensoner_type_id',
        'created_by_id','created_at',
    ];

    public function qualification()
    {
        return $this->belongsTo(Qualification::class, 'edu_qualification_id');
    }
    public function profession()
    {
        return $this->belongsTo(Profession::class, 'profession_id');
    }
    public function pensonertype()
    {
        return $this->belongsTo(PensonerType::class, 'pensoner_type_id');
    }
    public function vehicletype()
    {
        return $this->belongsTo(VehicleType::class, 'vehicle_id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id');
    }

    // public function intiperu()
    // {
    //     return $this->belongsTo(Intiperu::class, 'intiperu_id');
    // }


    public function setCreatedByIdAttribute($input)
    {
        $this->attributes['created_by_id'] = $input ? $input : null;
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }  


    public function setEntryDateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['entry_date'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['entry_date'] = null;
        }
    }

    public function getEntryDateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }



}
