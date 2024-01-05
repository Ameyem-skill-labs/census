<?php

namespace App\Models\PlaceRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;

class LoksabhaConstituency extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'state_id'];

    public function districts()
    {
        return $this->belongsToMany(District::class, 'district_loksabha_constituency');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function getAddress()
    {
        $state = $this->state;
        return [
            'id' => $this->id,
            'loksabha_constituency' => $this->name,
            'state' => $state ? $state->name : 'Not available'
        ];
    }

    public function getSubplaceIds() {
        // Fetching all Assembly Constituency IDs associated with this Loksabha Constituency
        $assemblyConstituencyIds = AssemblyConstituency::where('loksabha_constituency_id', $this->id)
                                                       ->pluck('id');
        return $assemblyConstituencyIds;
    }

    public function mandals()
    {
        // Assuming Mandals are related to Assembly Constituencies
        return $this->hasManyThrough(Mandal::class, AssemblyConstituency::class);
    }

    public function totalPeopleCount()
    {
        $totalPeople = 0;
        foreach ($this->mandals as $mandal) {
            $totalPeople += $mandal->totalPeopleCount();
        }
        return $totalPeople;
    }

    public function peopleCountBySubplace()
    {
        $mandalsPeopleCount = [];
        foreach ($this->mandals as $mandal) {
            $peopleCount = $mandal->totalPeopleCount();
            if ($peopleCount > 0) {
                $mandalsPeopleCount[] = [
                    'id' => $mandal->id,
                    'name' => $mandal->name,
                    'people_count' => $peopleCount
                ];
            }
        }
        return $mandalsPeopleCount;
    }
}
