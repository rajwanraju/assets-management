<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::create([
          'name' => 'Admin',
          'email' => 'admin@mail.com',
          'password' => bcrypt('12345678')
      ]);
    }
}
