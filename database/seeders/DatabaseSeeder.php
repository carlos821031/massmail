<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
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
        //$this->call(ContactSeeder::class);
        
        $admin = Role::create(['name' => 'administrator']);
        Permission::create(['name' => 'massmail'])->syncRoles([$admin]);

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',            
            'password' => bcrypt('password'),            
        ])->assignRole('administrator');
    }
}
