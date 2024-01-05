<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Role;
use App\User;
use App\Model\Person;
// use App\Model\State;
use App\Models\Admin;
use Carbon\Carbon;
use App\Models\PlaceRelated\Village;


class DatabaseSeeder extends Seeder
{

    public function run()
    {
       
        $this->call([
            RoleSeeder::class,
            UserSeeder::class, 
            StateSeeder::class,
            // TLDistrictSeeder::class,
            // TLMandalSeeder::class,        
            // TLVillageSeeder::class,            
            ProfessionSeeder::class,            
            DistrictSeeder::class,
            LoksabhaConstituencySeeder::class,
            DistrictLoksabhaConstituencySeeder::class,
            AssemblyConstituencySeeder::class,
            MandalSeeder::class,        
            VillageSeeder::class,
            // PersonSeed::class,
            // ProfileSeeder::class,
        ]);
        
    // Village::factory()->count(20)->create();
   




}
}
