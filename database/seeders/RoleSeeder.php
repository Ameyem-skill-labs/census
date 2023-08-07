<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { $roles = [
            
        ['id' => 1, 'title' => 'Administrator (can create other users)',],
        ['id' => 2, 'title' => 'User with full rights',],
        ['id' => 3, 'title' => 'Volunteer',],
        ['id' => 4, 'title' => 'Previlized user',],
        ['id' => 5, 'title' => 'Simple user',],

    ];
    foreach ($roles as $item) {
        \App\Role::create($item);
    }

    }
}
