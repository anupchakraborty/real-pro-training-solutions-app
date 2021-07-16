<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create Roles
        $rolesuperadmin = Role::create(['name'=>'superadmin']);
        $rolesysadmin = Role::create(['name' => 'sysadmin']);
        $rolesysowner = Role::create(['name' => 'sysowner']);
        $roleteacher = Role::create(['name' => 'teacher']);
        $roleuser = Role::create(['name' => 'user']);

        //Permission list as a array
         //Permission list as a array
         $permissions = [
            [
                'group_name' => 'dashboard',
                'permissions' => [
                    //Dashboard
                    'dashboard.view',
                    'dashboard.edit',
                ],
            ],
            [
                'group_name' => 'teacher',
                'permissions' => [
                    //teacher permissions
                    'teacher.create',
                    'teacher.view',
                    'teacher.edit',
                    'teacher.delete',
                ],
            ],
            [
                'group_name' => 'sysadmin',
                'permissions' => [
                    //sysadmin permissions
                    'sysadmin.create',
                    'sysadmin.view',
                    'sysadmin.edit',
                    'sysadmin.delete',
                    'sysadmin.approved',
                ],
            ],
            [
                'group_name' => 'sysowner',
                'permissions' => [
                    //sysowner permissions
                    'sysowner.create',
                    'sysowner.view',
                    'sysowner.edit',
                    'sysowner.delete',
                    'sysowner.approved',
                ],
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    //Role permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approved',
                ],
            ],
            [
                'group_name' => 'course',
                'permissions' => [
                    //course permissions
                    'course.create',
                    'course.view',
                    'course.edit',
                    'course.delete',
                    'course.approved',
                ],
            ],
            [
                'group_name' => 'admin',
                'permissions' => [
                    //admin permissions
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                ],
            ],
            [
                'group_name' => 'profile',
                'permissions' => [
                    //Profile permissions
                    'profile.view',
                    'profile.edit',
                ],
            ],

        ];
        //create assign permission

        for ($i=0; $i < count($permissions); $i++) {
            // data fatch group wise
           $permissionGroup = $permissions[$i]['group_name'];
           for ($j=0; $j < count($permissions[$i]['permissions']); $j++) {
               // create permission
               $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
               $rolesuperadmin->givePermissionTo($permission);
               $permission->assignRole($rolesuperadmin);
           }
       }
    }
}

