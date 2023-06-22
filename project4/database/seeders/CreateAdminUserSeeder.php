<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Str;

class CreateAdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // For user role data inject
        $role = Role::create([
            'title' => 'Admin',
        ]);
        $role = Role::create([
            'title' => 'Faculty',
        ]);
        $role = Role::create([
            'title' => 'Staff',
        ]);
        $role = Role::create([
            'title' => 'Director',
        ]);

        // For users account data inject
        $user = User::create([
            'id' => Str::uuid()->toString(),
            'email' => 'acadhead@pupqc.com',
            'password' => bcrypt('pupqcfarms'),
            'foreign_role_id' => 1,
        ]);
        $user = User::create([
            'id' => Str::uuid()->toString(),
            'email' => 'faculty@pupqc.com',
            'password' => bcrypt('pupqcfarms'),
            'foreign_role_id' => 2,
        ]);
        $user = User::create([
            'id' => Str::uuid()->toString(),
            'email' => 'staff@pupqc.com',
            'password' => bcrypt('pupqcfarms'),
            'foreign_role_id' => 3,
        ]);
        $user = User::create([
            'id' => Str::uuid()->toString(),
            'email' => 'director@pupqc.com',
            'password' => bcrypt('pupqcfarms'),
            'foreign_role_id' => 4,
        ]);
    }
}
