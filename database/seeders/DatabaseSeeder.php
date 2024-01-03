<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'category-create',
            'category-edit',
            'category-delete',
            'category-publish',
            'subcategory-create',
            'subcategory-edit',
            'subcategory-delete',
            'subcategory-publish',           
            'user-create',
            'user-edit',
            'user-delete',
            'user-publish',
            'role-create',
            'role-edit',
            'role-delete',
            'role-publish',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'permission-publish'
         ];
       
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }

        $user_role = Role::create(['name' => 'User']);
        $user = User::create([
            'name' => 'Dharam vir',
            'email' => 'dvpal2012@gmail.com',
            'password' => bcrypt('12345678')
        ]);
         $user->assignRole($user_role);         
         $role = Role::findByName($user_role->name);
         $role->syncPermissions($permissions);
 
         $admin_role = Role::create(['name' => 'Admin']);
         $admin = User::create([
             'name' => 'Sony Pal',
             'email' => 'sony.pal@gmail.com',
             'password' => bcrypt('12345678'),
         ]);
         $admin->assignRole($admin_role);
         $role = Role::findByName($admin_role->name);
         $role->syncPermissions($permissions);           
    }
}
