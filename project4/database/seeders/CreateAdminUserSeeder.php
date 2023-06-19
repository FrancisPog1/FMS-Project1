<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Str;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create([
            'title' => 'Admin',
        ]);

        // $role = Role::create([
        //     'title' => 'Staff',
        // ]);

        // $role = Role::create([
        //     'title' => 'Faculty',
        // ]);

        // $role = Role::create([
        //     'title' => 'Director',
        // ]);

        $user = User::create([
            'id' => Str::uuid()->toString(),
            'email' => 'andrew@gmail.com',
            'password' => bcrypt('password'),
            'foreign_role_id' => 1,
        ]);



    }
}
