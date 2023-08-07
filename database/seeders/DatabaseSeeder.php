<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Role;
use App\User;
use App\Model\Person;
use App\Model\State;
use App\Models\Admin;
use Carbon\Carbon;
use App\Models\PlaceRelated\Village;


class DatabaseSeeder extends Seeder
{

    public function run()
    {
       
    $this->call([
        RoleSeeder::class,
        // IntiperuSeeder::class,
        UserSeeder::class, 
        StateSeeder::class,
        
        DistrictSeeder::class,
        MandalSeeder::class,        
        VillageSeeder::class,
        
        TLDistrictSeeder::class,
        TLMandalSeeder::class,        
        TLVillageSeeder::class,                
        PersonSeed::class,
        PersonRelatedTableSeeder::class,
        // HouseDetailsTableSeeder::class,               
        TweetTypeSeeder::class,
        TweetsTableSeeder::class,
        ProfessionCategorySeeder::class,
        ProfileSeeder::class,      
        SanghamSeeder::class,
        
        
       
    ]);
    // Village::factory()->count(20)->create();
   




}
}
