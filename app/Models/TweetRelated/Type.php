<?php

namespace App\Models\TweetRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }
}