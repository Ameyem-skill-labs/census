<?php
namespace App\Models\PlaceRelated;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;
class Village extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name','mandal_id','created_by_id'];


    public function mandal()
    {
        return $this->belongsTo(Mandal::class, 'mandal_id');
    }
    public function people()
    {
        return $this->hasMany(Person::class, 'village_id');
    }

    public function getAddress()
    {
            $mandal = $this->mandal;
            $district = $mandal ? $mandal->district : null;
            $ac = $mandal ? $mandal->assembly_constituency : null;
            $lc = $ac ? $ac->loksabha_constituency : null;
            $state = $district ? $district->state : null;

            return [
                'id' => $this->id,
                'village' => $this->name,
                'mandal' => $mandal ? $mandal->name : 'Not available',
                'assembly_constituency' => $ac ? $ac->name : 'Not available',
                'district' => $district ? $district->name : 'Not available',
                'loksabha_constituency' => $lc ? $lc->name : 'Not available',
                'state' => $state ? $state->name : 'Not available'
            ];

    }
    // In Village.php model

    public function totalPeopleCount()
    {
        return Person::where('village_id', $this->id)->count();
    }

    public function peopleCountBySubplace()
    {
        return [
            [
                'id' => $this->id,
                'name' => $this->name,
                'people_count' => Person::where('village_id', $this->id)->count()
            ]
        ];
    }

        
   
}