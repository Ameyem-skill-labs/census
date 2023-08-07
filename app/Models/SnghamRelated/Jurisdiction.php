<?php

namespace App\Models\SnghamRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurisdiction extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'jurisdiction'];
}
