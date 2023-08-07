<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonRelatedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $items = [
        //     ['id' => 1, 'name' => 'Nalamara'],
        //     ['id' => 2, 'name' => 'Chupuri'],
        // ];
        // foreach ($items as $item) {
        //     \App\Models\Intiperu::create($item);
        // }


        $items = [
            
            ['id' => 1, 'name' => 'Below 10th'],
            ['id' => 2, 'name' => '10th'],
            ['id' => 3, 'name' => '12th'],
            ['id' => 4, 'name' => 'Graduate/Engeneering/MBBS'],
            ['id' => 5, 'name' => 'Post Garduate'],            
            ['id' => 6, 'name' => 'Civil Services'],
            ['id' => 7, 'name' => 'PhD'],
            ['id' => 8, 'name' => 'Undeducated'],
        ];
        foreach ($items as $item) {
            \App\Models\ProfileRelated\Qualification::create($item);
        }

        // $items = [
        //         ['id' => 1, 'name' => 'Government Employee'],
        //         ['id' => 2, 'name' => 'Private Employee'],
        //         ['id' => 3, 'name' => 'Business/Company/Shop'],
        //         ['id' => 4, 'name' => 'Farmer/Cheneta'],
        //         ['id' => 5, 'name' => 'Realestate/Building Contractor'],
        //         ['id' => 6, 'name' => 'Daily wage Worker/Driver (Shop,Building,Agri etc)'],
        //         ['id' => 7, 'name' => 'Media/Youtube/Insta Influencer'],
        //         ['id' => 8, 'name' => 'Freelancer/Self-employed'], 
        //         ['id' => 9, 'name' => 'Other'],               
        //         ['id' => 10, 'name' => 'House wife'],
        //         ['id' => 11, 'name' => 'Student'],
        //         ['id' => 12, 'name' => 'Retired'],
        //         ['id' => 13, 'name' => 'Unemployed'],
        //         ['id' => 14, 'name' => 'Not Applicable'],    
        // ];
        // foreach ($items as $item) {
        //     \App\Models\Profession::create($item);
        // }

        
        $items = [
            
            ['id' => 1, 'name' => 'Sr. Citizen'],
            ['id' => 2, 'name' => 'Physically Handicapped'],
            ['id' => 3, 'name' => 'Widow'],
            ['id' => 4, 'name' => 'Single Woman'],
            ['id' => 5, 'name' => 'Cheneta'],
            ['id' => 6, 'name' => 'Other'],
            ['id' =>7, 'name' => 'None'],
        ];
        foreach ($items as $item) {
            \App\Models\PensonerType::create($item);
        }


        $items = [
            
            ['id' => 1, 'name' => 'Two Wheeler'],
            ['id' => 2, 'name' => 'Auto'],
            ['id' => 3, 'name' => 'Four wheeler'],
            ['id' => 4, 'name' => 'Multiple whehicles'],
            ['id' => 5, 'name' => 'None'],
        ];
        foreach ($items as $item) {
            \App\Models\VehicleType::create($item);
        }

        $items = [
            
            ['id' => 1, 'name' => 'Own land'],
            ['id' => 2, 'name' => 'Koulu Land'],
            ['id' => 3, 'name' => 'None'],
            
        ];
        foreach ($items as $item) {
            \App\Models\AgriLandStatus::create($item);
        }

        

        
    }
}
