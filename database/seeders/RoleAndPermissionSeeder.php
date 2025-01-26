<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'publish products']);
        Permission::create(['name' => 'unpublish products']);
        Permission::create(['name' => 'edit products']);
        Permission::create(['name' => 'delete products']);

        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        // Create customer, company_user and company_admin roles
        $customerRole = Role::create(['name' => 'customer']);

        $companyUserRole = Role::create(['name' => 'company_user']);

        $companyAdminRole = Role::create(['name' => 'company_admin']);
        $companyAdminRole->givePermissionTo('delete products');
        $companyAdminRole->givePermissionTo('edit products');
        $companyAdminRole->givePermissionTo('unpublish products');
        $companyAdminRole->givePermissionTo('publish products');
        $companyAdminRole->givePermissionTo('edit users');
        $companyAdminRole->givePermissionTo('delete users');
    }
}
