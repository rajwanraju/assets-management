<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $permissions=[
             [
                 'name' => 'role-view'
             ],
             [
                 'name' => 'role-create'
             ],
             [
                 'name' => 'role-edit'
             ],
             [
                 'name' => 'role-delete'
             ],
             [
                 'name' => 'user-view'
             ],
             [
                 'name' => 'user-create'
             ],
             [
                 'name' => 'user-edit'
             ],
             [
                 'name' => 'user-delete'
             ],
             [
                 'name' => 'category-view'
             ],
             [
                 'name' => 'category-create'
             ],
             [
                 'name' => 'category-edit'
             ],
             [
                 'name' => 'category-delete'
             ],
             [
                 'name' => 'product-view'
             ],
             [
                 'name' => 'product-create'
             ],
             [
                 'name' => 'product-edit'
             ],
             [
                 'name' => 'product-delete'
             ],



     ];

     foreach ($permissions as $key=>$value){
      Permission::create($value);
     }
    }
}
