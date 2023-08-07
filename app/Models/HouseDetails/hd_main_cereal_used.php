<?php
namespace App\Models\HouseDetails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hd_main_cereal_used extends Model
{
    use HasFactory;
    protected $fillable = ["id","name","label"];
}