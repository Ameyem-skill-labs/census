<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PlaceRelated\Village;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;
use App\User;
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
        DB::table('people')->truncate();

        $faker = Faker::create();
        $villageIds = Village::pluck('id')->toArray();
        $val_userIds = User::where('role_id', 6)->pluck('id')->toArray(); // Get all user IDs
        $dist_userIds = User::where('role_id', 3)->pluck('id')->toArray(); // Get all user IDs
        foreach (range(1, 5000) as $index) { // Seed 50 records
            DB::table('people')->insert([
                'village_id' => $faker->randomElement($villageIds),
                'ward_number' => $faker->numerify('Ward ###'),    
                'door_number' => $faker->buildingNumber,
                'street' => $faker->streetName,
                'pincode' => '5' . $faker->numerify('#####'),
                'surname' => $faker->lastName,
                'name' => $faker->firstName,
                'avatar' => 'http://127.0.0.1:8000/images/avatar/user' . rand(1, 6) . '.jpg',
                'relative_name' => $faker->name,
                'mobile' => $faker->numerify('##########'),
                'date_of_birth' => $faker->date,
                'sex' => $faker->randomElement(['male', 'female', 'other']),
                'marriage_status' => $faker->randomElement(['single', 'married', 'widow', 'divorced']),
                'blood_group' => $faker->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
                'education' => $faker->randomElement(['nil', 'under_10th', '10th_pass', '12th_pass', 'graduate','masters' ]),
                'occupation' => $faker->randomElement(['study', 'unemployed', 'gvt_emp', 'pvt_emp', 'farmer', 'self_emp', 'business', 'other']),
                'created_by_id' => $faker->randomElement($val_userIds), // Random user ID or null
                'is_submitted' => $faker->boolean, // Random boolean value
                'is_approved' => $faker->boolean, // Random boolean value
                'approved_by_id' => $faker->boolean ? $faker->randomElement($dist_userIds) : null, // Random user ID or null based on 'is_approved'
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

}
