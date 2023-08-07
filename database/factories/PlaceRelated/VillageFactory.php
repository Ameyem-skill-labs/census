<?php

// namespace Database\Factories;
namespace Database\Factories\PlaceRelated;

use App\Models\PlaceRelated\Village;
use App\Models\Mandal;
use App\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VillageFactory extends Factory
{
    
    
    protected $model = Village::class;
    public function definition()
    {
        $mandals = Mandal::pluck('id')->toArray();
        $users = User::pluck('id')->toArray();
        
        return [
            'name' => $this->faker->city,
            'mandal_id' => $this->faker->randomElement($mandals),
            'created_by_id' => $this->faker->randomElement($users),
        ];
    }
}
