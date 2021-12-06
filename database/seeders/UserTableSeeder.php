<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Faker\Factory as Faker;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // $user = User::create([
      //     'name' => 'Admin',
      //     'email' => 'admin@mail.com',
      //     'password' => bcrypt('12345678')
      // ]);

//       $faker = \Faker\Factory::create();

//     for($i = 0; $i < 10; $i++) {
//         $user = User::create([
//             'phone' => $faker->e164PhoneNumber,
//             'name' => $faker->name,
//             'email' => $faker->email,
//             'password' =>  bcrypt('123456'),
//         ]);
// $user->assignRole('User');

//     }

      // $role = Role::create(['name' => 'Super Admin']);
      // $user->assignRole([$role->id]);
    }
}
