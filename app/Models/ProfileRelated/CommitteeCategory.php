<?php

namespace App\Models\ProfileRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommitteeCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function positions()
    {
        return $this->hasMany(CommitteePosition::class);
    }
}
