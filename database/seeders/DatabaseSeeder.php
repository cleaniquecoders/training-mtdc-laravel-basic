<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->seedPermissions();

        $admin = User::factory()
            ->withPersonalTeam()
            ->create([
                'email' => 'admin@app.com'
            ]);

        $admin->assignRole('superadmin');

        User::factory(1000)
            ->withPersonalTeam()
            ->create();

        Post::factory(1000)->create();
    }

    private function seedPermissions()
    {
        $permissions = [
            'create user', 'update user', 'view user', 'delete user'
        ];

        $roles = [
            'superadmin',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }

        foreach ($roles as $role) {
            $role = Role::create([
                'name' => $role,
            ]);

            foreach($permissions as $permission) {
                $role->givePermissionTo($permission);
            }
        }

    }
}
