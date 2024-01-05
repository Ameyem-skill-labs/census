<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DistrictLoksabhaConstituencySeeder extends Seeder
{
    public function run()
    {
        $items = [
            ['district_id' => 5420, 'loksabha_constituency_id' => 1],
            ['district_id' => 5420, 'loksabha_constituency_id' => 2],
            ['district_id' => 5431, 'loksabha_constituency_id' => 2],
            ['district_id' => 5430, 'loksabha_constituency_id' => 3],
            ['district_id' => 5431, 'loksabha_constituency_id' => 4],
            ['district_id' => 5442, 'loksabha_constituency_id' => 4],
            ['district_id' => 5441, 'loksabha_constituency_id' => 5],
            ['district_id' => 5440, 'loksabha_constituency_id' => 3],
            ['district_id' => 5441, 'loksabha_constituency_id' => 6],
            ['district_id' => 5451, 'loksabha_constituency_id' => 6],
            ['district_id' => 5450, 'loksabha_constituency_id' => 7],
            ['district_id' => 5452, 'loksabha_constituency_id' => 8],
            ['district_id' => 5461, 'loksabha_constituency_id' => 9],
            ['district_id' => 5460, 'loksabha_constituency_id' => 10],
            ['district_id' => 5471, 'loksabha_constituency_id' => 11],
            ['district_id' => 5470, 'loksabha_constituency_id' => 12],
            ['district_id' => 5481, 'loksabha_constituency_id' => 13],
            ['district_id' => 5480, 'loksabha_constituency_id' => 14],
            ['district_id' => 5490, 'loksabha_constituency_id' => 15],
            ['district_id' => 5491, 'loksabha_constituency_id' => 16],
            ['district_id' => 5491, 'loksabha_constituency_id' => 15],
            ['district_id' => 5500, 'loksabha_constituency_id' => 17],
            ['district_id' => 5500, 'loksabha_constituency_id' => 18],
            ['district_id' => 5542, 'loksabha_constituency_id' => 18],
            ['district_id' => 5510, 'loksabha_constituency_id' => 19],
            ['district_id' => 5540, 'loksabha_constituency_id' => 20],
            ['district_id' => 5521, 'loksabha_constituency_id' => 21],
            ['district_id' => 5520, 'loksabha_constituency_id' => 22],
            ['district_id' => 5530, 'loksabha_constituency_id' => 23],
            ['district_id' => 5530, 'loksabha_constituency_id' => 24],
            ['district_id' => 5531, 'loksabha_constituency_id' => 24],
            ['district_id' => 5541, 'loksabha_constituency_id' => 20],
            ['district_id' => 5542, 'loksabha_constituency_id' => 25],
            ['district_id' => 5541, 'loksabha_constituency_id' => 25],
        ];
        foreach ($items as $item) {
            \DB::table('district_loksabha_constituency')->insert($item);
        }
    }
}
