<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'phone' => '09-999888777',
            'address' => 'Yangon',
            'status' => 'active',
            'password' => bcrypt('admin'), // passwrod
            'role' => 'admin'
        ]);
        $role = Role::create(['name' => 'admin']);
        $user->assignRole($role);
    }
}
