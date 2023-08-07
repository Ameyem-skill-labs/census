<?php
namespace Database\Factories;

use Faker\Generator as Faker;
use Faker\Provider\PhoneNumber;
use Illuminate\Support\Str;
use App\User;

use Illuminate\Database\Eloquent\Factories\Factory;
class UserFactory extends Factory
{ 
    protected $model = User::class;
    public function definition()
    {
        $surname = $this->faker->lastName;
        $name = $this->faker->firstName;
        $username = strtolower(substr($surname, 0, 1) . $name);
        $phoneNumber = PhoneNumber::phoneNumber();
        $phoneNumber = substr($phoneNumber, 0, 10);
        
        return [
            'surname' => $surname,
            'name' => $name,
            'username' => $username,
            'mobile' => $phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'status' => 1,
            'role_id' => 1,
            'editing_village_id' => 1,
        ];
    }
}

// $factory->define(App\User::class, function (Faker\Generator $faker) {
//     return [
//         "name" => $faker->name,
//         "email" => $faker->safeEmail,
//         "password" => str_random(10),
//         "role_id" => factory('App\Role')->create(),
//         "remember_token" => $faker->name,
//     ];
// });
// $factory->define(User::class, function (Faker $faker) {
//     return [
        // 'surname' => $faker->lastName,
        // 'name' => $faker->firstName,
        // 'mobile' => $faker->phoneNumber,
        // 'email' => $faker->unique()->safeEmail,
        // 'password' => bcrypt('password'),
        // 'status' => 1,
        // 'role_id' => 1,
        // 'editing_village_id' => 1,
//     ];
// });