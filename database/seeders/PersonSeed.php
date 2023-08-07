<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Carbon\Carbon;
function string2date($input){
    // $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));
    $zeroDate=str_replace(['d', 'm', 'Y'], ['00', '00', '0000',],config('app.date_format'));

    if ($input != $zeroDate && $input != null) {
        return Carbon::createFromFormat('d-m-Y', $input)->format('Y-m-d H:i:s');
    } else {
        return '';
    }
}
class PersonSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    

    public function run()
    {
        
        

        $items = [           
            
            ['id' => 1, 'village_id' => 1,
            'ward_no'=>'01',
            'house_no'=>'12-345',
            'intiperu'=>'Nalamara', 'peru' => 'adi',
            'father_husb_name'=>'arun',
           'gender'=>'F',
           'dob'=> string2date('14-04-1994'), //Carbon::now()->format('Y-m-d'),
            'edu_qualification_id'=>1,
            'profession_id'=>1,
            'pensoner_type_id'=>1,
            'own_a_house'=>True,
            'vehicle_type_id'=>1,
            'own_agri_land'=>True,
            'land_area'=> 2.0,
           'aadhaar'=>'123456781234',
           'ration_card'=>'123456781234',
            'mobile'=>'8800197779','created_by_id'=>1,'created_at' => Carbon::now()->format('Y-m-d H:i:s'), ],

            ['id' => 2, 'village_id' => 1,
            'ward_no'=>'01',
            'house_no'=>'12-345',
            'intiperu'=>'Nalamara', 'peru' => 'Vedansh',
            'father_husb_name'=>'arun',
           'gender'=>'M',
           'dob'=> string2date('03-07-2016'),//Carbon::now()->format('Y-m-d'),
            'edu_qualification_id'=>1,
            'profession_id'=>1,
            'pensoner_type_id'=>1,
            'own_a_house'=>False,
            'vehicle_type_id'=>1,
            'own_agri_land'=>False,
            'land_area'=> 2.0,
           'aadhaar'=>'123456781234',
           'ration_card'=>'123456781234',
            'mobile'=>'8800197779','created_by_id'=>1,'created_at' => Carbon::now()->format('Y-m-d H:i:s'), ],
           

        ];

        foreach ($items as $item) {
            \App\Models\Person::create($item);
        }
    }
}
