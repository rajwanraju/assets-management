<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $roles=[
               [
                   'name' => 'admin',
                   'name' => 'Employee',
                   'name' => 'User',
               ],




       ];

       foreach ($roles as $key=>$value){
        Role::create($value);
       }
    }
}
