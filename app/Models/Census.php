<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Census extends Model
{
    use HasFactory;

    use Notifiable;
    protected $guard = 'census';
    protected $fillable = [
        'id','peru','inti_peru_id','father_id','mother_id','native_village_id','present_village_id','mobile','email','marriege_status','date_of_birth',
        'education_id','job_id','company_id','created_by_id','image','created_at','updated_at',
    ];
}
