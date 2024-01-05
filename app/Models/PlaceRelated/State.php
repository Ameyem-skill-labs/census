<?php

namespace App\Models\PlaceRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;
class State extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name','initial','country_id'];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function getAddress()
    {
            $state = $this->state;
            return [
                'id' => $this->id,
                'state' => $this->name,
            ];

    }
    public function getSubplaceIds() {
        // Fetching all Mandal IDs associated with this District ID
        $district_ids = District::where('state_id', $this->id)
                            ->pluck('id');
        return $district_ids;
    }

    // public function totalPeopleCount()
    // {
    //     $totalPeople = 0;
    //     foreach ($this->districts as $district) {
    //         $totalPeople += $district->totalPeopleCount();
    //     }
    //     return $totalPeople;
    // }
    public function totalPeopleCount()
    {
        $totalPeople = 0;
        foreach ($this->districts as $district) {
            $mandalIds = Mandal::where('district_id', $district->id)->pluck('id');
            $villageIds = Village::whereIn('mandal_id', $mandalIds)->pluck('id');
            $totalPeople += Person::whereIn('village_id', $villageIds)->count();
        }
        return $totalPeople;
    }

    // // This takes 16s
    // public function peopleCountBySubplace()
    // {
    //     $districtsPeopleCount = [];
    //     foreach ($this->districts as $district) {
    //         $peopleCount = $district->totalPeopleCount();
    //         $districtsPeopleCount[] = [
    //             'name' => $district->name,
    //             'people_count' => $peopleCount
    //         ];
    //     }
    //     return $districtsPeopleCount;
    // }

    //this takes 2sec
    public function peopleCountBySubplace()
    {
        $districtsPeopleCount = [];
        foreach ($this->districts as $district) {
            $mandalIds = Mandal::where('district_id', $district->id)->pluck('id');
            $villageIds = Village::whereIn('mandal_id', $mandalIds)->pluck('id');
            $peopleCount = Person::whereIn('village_id', $villageIds)->count();
            if ($peopleCount>0)
            $districtsPeopleCount[] = [
                'id' => $district->id,
                'name' => $district->name,
                'people_count' => $peopleCount
            ];
        }
        return $districtsPeopleCount;
    }
}

