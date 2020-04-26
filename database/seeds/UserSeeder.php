<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Test Teacher',
            'email' => 'teacher@test.hu',
            'password' => Hash::make('admin'),
            'teacher' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Test Student',
            'email' => 'student@test.hu',
            'password' => Hash::make('admin'),
            'teacher' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
