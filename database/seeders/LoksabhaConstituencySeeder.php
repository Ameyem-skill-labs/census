<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoksabhaConstituencySeeder extends Seeder
{
    public function run()
    {
        $items = [
            ['id' => 1, 'name' => 'Srikakulam', 'state_id' => 28],
            ['id' => 2, 'name' => 'Vizianagaram', 'state_id' => 28],
            ['id' => 3, 'name' => 'Araku', 'state_id' => 28],
            ['id' => 4, 'name' => 'Visakhapatnam', 'state_id' => 28],
            ['id' => 5, 'name' => 'Anakapalli', 'state_id' => 28],
            ['id' => 6, 'name' => 'Kakinada', 'state_id' => 28],
            ['id' => 7, 'name' => 'Rajahmundry', 'state_id' => 28],
            ['id' => 8, 'name' => 'Amalapuram', 'state_id' => 28],
            ['id' => 9, 'name' => 'Narasapuram', 'state_id' => 28],
            ['id' => 10, 'name' => 'Eluru', 'state_id' => 28],
            ['id' => 11, 'name' => 'Vijayawada', 'state_id' => 28],
            ['id' => 12, 'name' => 'Machilipatnam', 'state_id' => 28],
            ['id' => 13, 'name' => 'Narasaraopet', 'state_id' => 28],
            ['id' => 14, 'name' => 'Guntur', 'state_id' => 28],
            ['id' => 15, 'name' => 'Bapatla', 'state_id' => 28],
            ['id' => 16, 'name' => 'Ongole', 'state_id' => 28],
            ['id' => 17, 'name' => 'Nellore', 'state_id' => 28],
            ['id' => 18, 'name' => 'Tirupati', 'state_id' => 28],
            ['id' => 19, 'name' => 'Kadapa', 'state_id' => 28],
            ['id' => 20, 'name' => 'Rajampet', 'state_id' => 28],
            ['id' => 21, 'name' => 'Nandyal', 'state_id' => 28],
            ['id' => 22, 'name' => 'Kurnool', 'state_id' => 28],
            ['id' => 23, 'name' => 'Anantapur', 'state_id' => 28],
            ['id' => 24, 'name' => 'Hindupur', 'state_id' => 28],
            ['id' => 25, 'name' => 'Chittoor', 'state_id' => 28],
        ];
foreach ($items as $item) {
    \App\Models\PlaceRelated\LoksabhaConstituency::create($item);
}  
    }
}
