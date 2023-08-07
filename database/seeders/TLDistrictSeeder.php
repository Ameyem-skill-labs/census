<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TLDistrictSeeder extends Seeder
{
    public function run()
    {
        $items = [
        ['id' => 532,'census_name' => 'Adilabad', 'name' => 'Adilabad', 'state_id' => 36],
        ['id' => 533,'census_name' => 'Nizamabad', 'name' => 'Nizamabad', 'state_id' => 36],
        ['id' => 534,'census_name' => 'Karimnagar', 'name' => 'Karimnagar', 'state_id' => 36],
        ['id' => 535,'census_name' => 'Medak', 'name' => 'Medak', 'state_id' => 36],
        ['id' => 536,'census_name' => 'Hyderabad', 'name' => 'Hyderabad', 'state_id' => 36],
        ['id' => 537,'census_name' => 'Rangareddy', 'name' => 'Rangareddy', 'state_id' => 36],
        ['id' => 538,'census_name' => 'Mahbubnagar', 'name' => 'Mahbubnagar', 'state_id' => 36],
        ['id' => 539,'census_name' => 'Nalgonda', 'name' => 'Nalgonda', 'state_id' => 36],
        ['id' => 540,'census_name' => 'Warangal', 'name' => 'Warangal', 'state_id' => 36],
        ['id' => 541,'census_name' => 'Khammam', 'name' => 'Khammam', 'state_id' => 36],
];foreach ($items as $item) {
    \App\Models\District::create($item);
}     }
}
