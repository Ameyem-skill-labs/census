<?php

namespace App\Models\ProfileRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommitteePosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'type_id',
        'sub_category_id',
        'position_id',
        'date_of_start',
        'date_of_end'
    ];

    public function category()
    {
        return $this->belongsTo(CommitteeCategory::class);
    }

    public function type()
    {
        return $this->belongsTo(CommitteeType::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(CommitteeSubCategory::class);
    }

    public function positionName()
    {
        return $this->belongsTo(CommitteePositionName::class);
    }
}

