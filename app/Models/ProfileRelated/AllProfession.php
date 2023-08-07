<?php

namespace App\Models\ProfileRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllProfession extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'created_by_id',
    ];

    public function category()
    {
        return $this->belongsTo(ProfessionCategory::class);
    }
}

