<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SanghamRelated\Position;
class PositionSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            ['position' => 'Precident', 'position_telugu' => 'అధ్యక్షుడు'],
            ['position' => 'Principal secretory', 'position_telugu' => 'ప్రధాన కార్యదర్శి'],
            ['position' => 'Treasurer', 'position_telugu' => 'కోశాధికారి'],
            ['position' => 'Vice President', 'position_telugu' => 'ఉపాధ్యక్షుడు'],
            ['position' => 'Joint secretory', 'position_telugu' => 'జాయింట్ కార్యదర్శి'],
            ['position' => 'Organising secretory', 'position_telugu' => 'ఆర్గనైజింగ్ కార్యదర్శి'],
            ['position' => 'Secretory', 'position_telugu' => 'కార్యదర్శి'],
            ['position' => 'Member', 'position_telugu' => 'సభ్యుడు'],
        ];

        foreach ($positions as $position) {
            \App\Models\SnghamRelated\Position::create($position);
        }


    }
}
