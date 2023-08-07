<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    public function run()
    {
        $items = [
        ['id' => 5440,'census_name' => 'Visakhapatnam', 'name' => 'Alluri Sitharama Raju', 'state_id' => 28],
        ['id' => 5441,'census_name' => 'Visakhapatnam', 'name' => 'Anakapalli', 'state_id' => 28],
        ['id' => 5530,'census_name' => 'Anantapur', 'name' => 'Anantapuram', 'state_id' => 28],
        ['id' => 5540,'census_name' => 'Chittoor', 'name' => 'Annamayya', 'state_id' => 28],
        ['id' => 5490,'census_name' => 'Prakasam', 'name' => 'Bapatla', 'state_id' => 28],
        ['id' => 5541,'census_name' => 'Chittoor', 'name' => 'Chittoor', 'state_id' => 28],
        ['id' => 5450,'census_name' => 'East Godavari', 'name' => 'East Godavari', 'state_id' => 28],
        ['id' => 5460,'census_name' => 'West Godavari', 'name' => 'Eluru', 'state_id' => 28],
        ['id' => 5480,'census_name' => 'Guntur', 'name' => 'Guntur', 'state_id' => 28],
        ['id' => 5451,'census_name' => 'East Godavari', 'name' => 'Kakinada', 'state_id' => 28],
        ['id' => 5452,'census_name' => 'East Godavari', 'name' => 'Konaseema', 'state_id' => 28],
        ['id' => 5470,'census_name' => 'Krishna', 'name' => 'Krishna', 'state_id' => 28],
        ['id' => 5520,'census_name' => 'Kurnool', 'name' => 'Kurnool', 'state_id' => 28],
        ['id' => 5471,'census_name' => 'Krishna', 'name' => 'NTR', 'state_id' => 28],
        ['id' => 5521,'census_name' => 'Kurnool', 'name' => 'Nandyal', 'state_id' => 28],
        ['id' => 5481,'census_name' => 'Guntur', 'name' => 'Palnadu', 'state_id' => 28],
        ['id' => 5430,'census_name' => 'Vizianagaram', 'name' => 'Parvathipuram Manyam', 'state_id' => 28],
        ['id' => 5491,'census_name' => 'Prakasam', 'name' => 'Prakasam', 'state_id' => 28],
        ['id' => 5500,'census_name' => 'Sri Potti Sriramulu Nellore', 'name' => 'Sri Potti Sri Ramulu Nellore', 'state_id' => 28],
        ['id' => 5531,'census_name' => 'Anantapur', 'name' => 'Sri Sathya Sai', 'state_id' => 28],
        ['id' => 5420,'census_name' => 'Srikakulam', 'name' => 'Srikakulam', 'state_id' => 28],
        ['id' => 5542,'census_name' => 'Chittoor', 'name' => 'Tirupati', 'state_id' => 28],
        ['id' => 5442,'census_name' => 'Visakhapatnam', 'name' => 'Visakhapatnam', 'state_id' => 28],
        ['id' => 5431,'census_name' => 'Vizianagaram', 'name' => 'Vizianagaram', 'state_id' => 28],
        ['id' => 5461,'census_name' => 'West Godavari', 'name' => 'West Godavari', 'state_id' => 28],
        ['id' => 5510,'census_name' => 'Y.S.R.', 'name' => 'YSR', 'state_id' => 28],
];
foreach ($items as $item) {
    \App\Models\District::create($item);
}  
    }
}
