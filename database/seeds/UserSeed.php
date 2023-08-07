<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
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
            
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'ab@ameyem.com', 'password' =>bcrypt('arun@123'), 'role_id' => 1, 'remember_token' => '', 'currency_id' => 1],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
