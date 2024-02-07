<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $adminRole = Role::create(['name'=>'admin']);
        $apprenantRole = Role::create(['name'=>'apprenant']);

        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'Register']);
        Permission::create(['name' => 'Aplly_to_job']);
        Permission::create(['name' => 'view_job_suggestions']);
        $adminRole->givePermissionTo('manage_users');
        $apprenantRole->givePermissionTo('Register', 'Aplly_to_job', 'view_job_suggestions');

    }
}
