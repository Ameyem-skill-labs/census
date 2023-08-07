<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ProfileRelated\Profile;
use App\User;
use App\Models\PlaceRelated\Village;

class EmptyingSeeder extends Seeder
{
    public function run()
    {
        $users = Profile::truncate();
    }
}