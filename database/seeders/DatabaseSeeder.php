<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        \App\Models\User::factory(1000)
            ->withPersonalTeam()
            ->create();

        \App\Models\Post::factory(1000)->create();
    }

    private function seedPermissions()
    {
        $permissions = [
            'create user', 'update user', 'view user', 'delete user'
        ];

        $roles = [
            'superadmin', 'user',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }

        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
            ]);
        }

    }
}
