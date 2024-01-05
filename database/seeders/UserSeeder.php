<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Models\PlaceRelated\Village;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     $users = User::truncate();
    // }
    public function run()
    {
        // DB::table('users')->truncate();
        
        // ,'password' => '$2y$10$msflsjAZ7jGwsJBZ18Uthu.C8DWDzxdRGhuwQpFUgreL4MPPxU0zq'
        // $items = [
            
            
            // ['id'=>1,'surname'=>'Nalamara','name'=>'Arun','username'=>'arun','mobile'=>'8800197778',
            // 'email'=>'ab@ameyem.com','password'=>bcrypt('ab@123'),'status'=>1,'role_id'=>1,'editing_village_id'=>1],
            // ['id'=>2,'surname'=>'Nalamara','name'=>'Vedansh','username'=>'vedansh','mobile'=>'8800197778',
            // 'email'=>'ab2@ameyem.com','password'=>bcrypt('arun123'),'status'=>1,'role_id'=>1,'editing_village_id'=>1],
            

        // ];

        $items = [
            ['id'=>1,'surname'=>'Nalamara','name'=>'Arun','username'=>'arun','mobile'=>'8800197778',
            'email'=>'ab@ameyem.com','password'=>bcrypt('ab@123'),'status'=>1,'role_id'=>1,'editing_village_id'=>597095],
            // ['id'=>2,'surname'=>'Nalamara','name'=>'Vedansh','username'=>'vedansh','mobile'=>'8800197778',
            // 'email'=>'abdp@ameyem.com','password'=>bcrypt('arun123'),'status'=>1,'role_id'=>3,'editing_village_id'=>597095],
            // ['id' => 1, 'surname' => 'మోడెం', 'name' => ' వీరాంజనేయ ప్రసాద్', 'username' => 'వీరాంజనేయప్రసాద్2', 'mobile' => '9676333377', 'email' => 'vprasad@thogata.com', 'password' => bcrypt('Thogata@123'), 'status' => 1, 'role_id' => 2,], 
            // ['id' => 2, 'surname' => 'సురువు ', 'name' => 'శ్రీలత ', 'username' => 'శ్రీలత77', 'mobile' => '9014722167', 'email' => 'శ్రీలత52@dummy.com', 'password' => bcrypt('Thogata@123'), 'status' => 0, 'role_id' => 2, ], 
            // ['id' => 3, 'surname' => 'నలమార', 'name' => 'అరుణ్ బాబు ', 'username' => 'అరుణ్బాబు12', 'mobile' => '8800197778', 'email' => 'arun67@dummy.com', 'password' => bcrypt('Thogata@123'), 'status' => 0, 'role_id' => 2, ], 
            // ['id' => 4, 'surname' => 'అనంత ', 'name' => 'మల్లిఖార్జున', 'username' => 'మల్లిఖార్జున70', 'mobile' => '8008337053', 'email' => 'mal72@dummy.com', 'password' => bcrypt('Thogata@123'), 'status' => 0, 'role_id' => 3, 'editing_village_id' => Village::inRandomOrder()->pluck('id')->first(),], 
            
            // ['id' => 5, 'surname' => 'భోజనపు ', 'name' => 'వెంకటనారాయణ', 'username' => 'వెంకటనారాయణ55', 'mobile' => '9440269331', 'email' => 'vnarayana27@dummy.com', 'password' => bcrypt('Thogata@123'), 'status' => 0, 'role_id' => 3, 'editing_village_id' => Village::inRandomOrder()->pluck('id')->first(),], 
            // ['id' => 6, 'surname' => 'పురుము', 'name' => 'మల్లయ్య', 'username' => 'మల్లయ్య25', 'mobile' => '9666770205', 'email' => 'mallayya97@dummy.com', 'password' => bcrypt('Thogata@123'), 'status' => 0, 'role_id' => 3, 'editing_village_id' => Village::inRandomOrder()->pluck('id')->first(),], 
            // ['id' => 7, 'surname' => 'మందపల్లి', 'name' => 'బాబు', 'username' => 'బాబు52', 'mobile' => '9989971111', 'email' => 'బాబు59@dummy.com', 'password' => bcrypt('Thogata@123'), 'status' => 0, 'role_id' => 3, 'editing_village_id' => Village::inRandomOrder()->pluck('id')->first(),], 
            // ['id' => 8, 'surname' => 'సైదాం ', 'name' => 'కాటారి', 'username' => 'కాటారి27', 'mobile' => '9493367047', 'email' => 'కాటారి21@dummy.com', 'password' => bcrypt('Thogata@123'), 'status' => 0, 'role_id' => 3, 'editing_village_id' => Village::inRandomOrder()->pluck('id')->first(),],
            // ['id' => 9, 'surname' => 'Surname18', 'name' => 'User18', 'username' => 'user18', 'mobile' => '9000000018', 'email' => 'abdeo@dummy.com', 'password' => bcrypt('arun123'), 'status' => 0, 'role_id' => 6, 'editing_village_id' => Village::inRandomOrder()->pluck('id')->first(), ],
            // ['id' => 10, 'surname' => 'Surname19', 'name' => 'User19', 'username' => 'user19', 'mobile' => '9000000019', 'email' => 'user19@dummy.com', 'password' => bcrypt('Thogata@123'), 'status' => 0, 'role_id' => 6, 'editing_village_id' => Village::inRandomOrder()->pluck('id')->first(), ],

];

        foreach ($items as $item) {
            unset($item['id']); // Remove the 'id' element from the $item array
            User::create($item);
        }
        // User::factory()->count(10)->create();
    }
}
