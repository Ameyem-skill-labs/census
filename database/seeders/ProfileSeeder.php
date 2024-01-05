<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ProfileRelated\Profile;
use App\User;
use App\Models\PlaceRelated\Village;

class ProfileSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            $items = [[
                'user_id' => $user->id,
                'gender' => 'Male', // Example, set as needed
                'avatar' => 'http://127.0.0.1:8000/images/avatar/user' . rand(1, 6) . '.jpg',
                'marriage_status' => 'Single', // Example, set as needed
                'about' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'mobile' => '1234567890', // Example, set as needed
                'date_of_birth' => '1990-01-01',
                'education_id' => rand(1, 5), // Replace with valid IDs or logic
                'profession_id' => rand(1, 5), // Replace with valid IDs or logic
                'role_id' => rand(1, 5), // Replace with valid IDs or logic
                'native_place_id' => 570652,
                'present_place_id' =>570662, # Village::inRandomOrder()->pluck('id')->first()
            ]];
        }
        foreach ($items as $item) {
            \App\Models\ProfileRelated\Profile::create($item);
        }


        // $items = [
            
        //     ['id' => 1, 'name' => 'Male'],
        //     ['id' => 2, 'name' => 'Female'],
        //     ['id' => 3, 'name' => 'Other'],
            
        // ];
        // foreach ($items as $item) {
        //     \App\Models\ProfileRelated\Gender::create($item);
        // }
    }
}
