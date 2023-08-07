<?php

namespace App\Models\ProfileRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','created_by_id'
    ];

    public function professions()
    {
        return $this->hasMany(AllProfession::class);
    }
}
