<?php

namespace App\Models\PlaceRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;

class District extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'state_id'];

    public function loksabhaConstituencies()
    {
        return $this->belongsToMany(LoksabhaConstituency::class, 'district_loksabha_constituency');
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
            'district' => $this->name,
            'state' => $state ? $state->name : 'Not available'
        ];
    }
    public function getSubplaceIds() {
        // Fetching all Assembly Constituency IDs associated with this District
        $mandalIds = Mandal::where('district_id', $this->id)
                                                        ->pluck('id');
        return $mandalIds;
    }

    public function mandals()
    {
        return $this->hasMany(Mandal::class);
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
