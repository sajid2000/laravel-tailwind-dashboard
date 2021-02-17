<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        User::insert([
        	[
        		'role_id' => 1,
        		'name' => 'Sajid',
        		'email' => 'admin@admin.com',
        		'password' => bcrypt('12345678'),
        		'created_at' => now(),
        		'updated_at' => now(),
        	],
        ]);
    }
}
