<?php

namespace App\Models\PlaceRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;
class AssemblyConstituency extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'loksabha_constituency_id', 'district_id'];

    public function loksabha_constituency()
    {
        return $this->belongsTo(LoksabhaConstituency::class, 'loksabha_constituency_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
    public function mandals()
    {
        return $this->hasMany(Mandal::class);
    }


    public function getAddress()
    {
        $district = $this->district;
        $loksabha_constituency = $this->loksabha_constituency;
        $state = $district ? $district->state : null;

        return [
            'id' => $this->id,
            'assembly_constituency' => $this->name,
            'loksabha_constituency' => $loksabha_constituency ? $loksabha_constituency->name : 'Not available',
            'district' => $district ? $district->name : 'Not available',
            'state' => $state ? $state->name : 'Not available'
        ];
    }

    public function getSubplaceIds() {
        // Fetching all Mandal IDs associated with this Assembly Constituency ID
        $mandal_ids = Mandal::where('assembly_constituency_id', $this->id)
                            ->pluck('id');
        return $mandal_ids;
    }

    public function totalPeopleCount()
    {
        // Sum of people in all Mandals under this Assembly Constituency
        $totalPeople = 0;
        foreach ($this->mandals as $mandal) {
            $totalPeople += $mandal->totalPeopleCount();
        }
        return $totalPeople;
    }

    public function peopleCountBySubplace()
    {
        // People count for each Mandal under this Assembly Constituency
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