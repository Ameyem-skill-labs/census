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
            Profile::create([
                'user_id' => $user->id,
                'avatar'=>'http://127.0.0.1:8000/images/avatar/user'.rand(1, 6).'.jpg',
                'cover_photo' => 'http://127.0.0.1:8000/images/1679701774.jpg',
                'date_of_birth' => '1990-01-01',
                'gender' => 'Male',
                'married' => false,
                'gotram' => 'Some Gotram',
                'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'best_known_for' => 'Best known for lorem ipsum',
                'achievements_recognitions' => 'Received recognition for X',
                'native_place_id' =>  Village::inRandomOrder()->pluck('id')->first(),
                'work_place_id' => Village::inRandomOrder()->pluck('id')->first(),
                'education_id' => rand(1, 8),
                'profession_id' => rand(1, 114),
                'about_work' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'work_experience' => 'Worked at X for 5 years',
                'interests' => 'Interests include lorem ipsum',
                'twitter_handle' => 'example',
                'linkedin_handle' => 'example',
                'facebook_handle' => 'example',
                'instagram_handle' => 'example',
            ]);
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
