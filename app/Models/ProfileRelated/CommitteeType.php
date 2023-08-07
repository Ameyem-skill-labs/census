<?php

namespace App\Models\ProfileRelated;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommitteeType extends Model
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
