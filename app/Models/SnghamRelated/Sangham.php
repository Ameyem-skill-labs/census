<?php

namespace App\Models\SnghamRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sangham extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name','about','registration_details', 'jurisdiction_id','place_id','place_type','created_by_id','approved','approved_by_id','effective_from'];

    public function jurisdiction()
    {
        return $this->belongsTo(Jurisdiction::class);
    }

    public function properSangham()
    {
        $array = parent::toArray(); 

        // if ($this->profile->avatar) {
        //     $array['avatar'] =asset($this->profile->avatar);
        // } else {
        //     $array['avatar'] = asset('images/avatar/dummy.webp');
        // }
        return $array;
    }
}
