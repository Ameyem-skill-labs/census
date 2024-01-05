<?php

namespace App\Models\PlaceRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;
class Muncipality extends Model
{
    protected $fillable = ['id', 'name','mandal_id','district_id'];


    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
    public function mandal()
    {
        return $this->belongsTo(Mandal::class, 'mandal_id');
    }

    public function getAddress()
    {
            $district = $this->district;
            $mandal = $this->mandal;
            $state = $district ? $district->state : null;

            return [
                'id' => $this->id,
                'muncipality' => $this->name,
                'mandal' => $mandal ? $mandal->name : 'Not available',
                'district' => $district ? $district->name : 'Not available',
                'state' => $state ? $state->name : 'Not available'
            ];

    }
} 