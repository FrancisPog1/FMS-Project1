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
        $user = User::create([
            'id' => Str::uuid()->toString(),
            'email' => 'andrew@gmail.com',
            'password' => bcrypt('ssssssss')
        ]);
        
        $role = Role::create([
            'title' => 'Academic Head',
            'id' => Str::uuid()->toString()
        ]);
         
    }
}