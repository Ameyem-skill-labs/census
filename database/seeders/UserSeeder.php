<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ,'password' => '$2y$10$msflsjAZ7jGwsJBZ18Uthu.C8DWDzxdRGhuwQpFUgreL4MPPxU0zq'
        $items = [
            
            
            ['id'=>1,'surname'=>'Nalamara','name'=>'Arun','username'=>'arun','mobile'=>'8800197778',
            'email'=>'ab@ameyem.com','password'=>bcrypt('ab@123'),'status'=>1,'role_id'=>1,'editing_village_id'=>1],
            ['id'=>2,'surname'=>'Nalamara','name'=>'Vedansh','username'=>'vedansh','mobile'=>'8800197778',
            'email'=>'ab2@ameyem.com','password'=>bcrypt('arun123'),'status'=>1,'role_id'=>1,'editing_village_id'=>1],

        ];

        foreach ($items as $item) {
            User::create($item);
        }
        // User::factory()->count(10)->create();
    }
}
