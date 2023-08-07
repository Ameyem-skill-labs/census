<?php

namespace App\Models\PlaceRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mandal;




class Village extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name','mandal_id','created_by_id'];


    public function mandal()
    {
        return $this->belongsTo(Mandal::class, 'mandal_id');
    }
   
}