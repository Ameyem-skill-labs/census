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
        
        // $table->string('dependant_name',120);
        // $table->string('dependant_related_as',20);
        // $table->char('gender',5);
        // $table->date('dob');
        // $table->tinyInteger('edu_qualification_id');
        // $table->tinyInteger('profession_id');
        // $table->char('mobile',16);
        // $table->foreignId('created_by_id')->nullable()->constrained('users')->onDelete('cascade');
        // $table->boolean('is_submitted');
        // $table->boolean('is_approved');
        // $table->foreignId('approved_by_id')->nullable()->constrained('users')->onDelete('cascade');
        // $table->timestamps();

        $items = [           
            
            ['id' => 1, 'village_id' => 1,
            'ward_no'=>'01',
            'house_no'=>'12-345',
            'intiperu'=>'Nalamara', 'peru' => 'adi',
            'dependant_name'=>'arun',
            'dependant_related_as'=>'Husband',
           'gender'=>'F',
           'dob'=> string2date('14-04-1994'), //Carbon::now()->format('Y-m-d'),
            'edu_qualification_id'=>1,
            'profession_id'=>1,


            'mobile'=>'8800197779','created_by_id'=>1,'is_submitted'=>false,'is_approved'=>false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), ],

            ['id' => 2, 'village_id' => 1,
            'ward_no'=>'01',
            'house_no'=>'12-345',
            'intiperu'=>'Nalamara', 'peru' => 'Vedansh',
            'dependant_name'=>'arun',
            'dependant_related_as'=>'Father',
           'gender'=>'M',
           'dob'=> string2date('03-07-2016'),//Carbon::now()->format('Y-m-d'),
            'edu_qualification_id'=>1,
            'profession_id'=>1,

            'mobile'=>'8800197779','created_by_id'=>1,'is_submitted'=>false,'is_approved'=>false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'), ],
           

        ];

        foreach ($items as $item) {
            \App\Models\Person::create($item);
        }
    }
}
