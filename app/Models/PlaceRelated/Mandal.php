<?php

namespace App\Models\PlaceRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;

class Mandal extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'assembly_constituency_id', 'district_id'];

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function assembly_constituency()
    {
        return $this->belongsTo(AssemblyConstituency::class, 'assembly_constituency_id');
    }

    public function villages()
    {
        return $this->hasMany(Village::class);
    }

    public function getAddress()
    {
        $district = $this->district;
        $assembly_constituency = $this->assembly_constituency;
        $lc = $assembly_constituency ? $assembly_constituency->loksabha_constituency : null;
        $state = $district ? $district->state : null;

        return [
            'id' => $this->id,
            'mandal' => $this->name,
            'district' => $district ? $district->name : 'Not available',
            'loksabha_constituency' => $lc ? $lc->name : 'Not available',
            'assembly_constituency' => $assembly_constituency ? $assembly_constituency->name : 'Not available',
            'state' => $state ? $state->name : 'Not available'
        ];
    }

    public function getSubplaceIds() {
        // Fetching all Village IDs associated with this Mandal ID
        $village_ids = Village::where('mandal_id', $this->id)
                              ->pluck('id');
        return $village_ids;
    }

    public function totalPeopleCount()
    {
        $villageIds = $this->villages->pluck('id');
        return Person::whereIn('village_id', $villageIds)->count();
    }

    public function peopleCountBySubplace()
    {
        $villagesPeopleCount = [];
        foreach ($this->villages as $village) {
            $peopleCount = Person::where('village_id', $village->id)->count();
            if ($peopleCount > 0) {
                $villagesPeopleCount[] = [
                    'id' => $village->id,
                    'name' => $village->name,
                    'people_count' => $peopleCount
                ];
            }
        }
        return $villagesPeopleCount;
    }
}
