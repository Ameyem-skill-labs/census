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
        ['id' => 2, 'title' => 'State President',],
        ['id' => 3, 'title' => 'District President',],
        ['id' => 4, 'title' => 'DEO (Data Entry Officer)',],        
        ['id' => 5, 'title' => 'State Member',],
        ['id' => 6, 'title' => 'District Member',],
        ['id' => 7, 'title' => 'Village Member',],
        ['id' => 8, 'title' => 'Other',],

    ];
    foreach ($roles as $item) {
        \App\Role::create($item);
    }

    }
}
