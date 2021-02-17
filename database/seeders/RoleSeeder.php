<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();

        Role::insert([
        	[
                'id' => 1,
        		'name' => 'Admin',
        		'slug' => 'admin',
        		'created_at' => now(),
        		'updated_at' => now(),
        	],
        	[
                'id' => 2,
        		'name' => 'User',
        		'slug' => 'user',
        		'created_at' => now(),
        		'updated_at' => now(),
        	],
            [
                'id' => 3,
                'name' => 'Manager',
                'slug' => 'manager',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
