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
            'name' => 'dr. Fodor Pál István',
            'email' => 't1@btn.hu',
            'password' => Hash::make('admin'),
            'teacher' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Novák Csanád',
            'email' => 't2@btn.hu',
            'password' => Hash::make('admin'),
            'teacher' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'dr. Major Andrea',
            'email' => 't3@btn.hu',
            'password' => Hash::make('admin'),
            'teacher' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Borbély Csenge',
            'email' => 's1@btn.hu',
            'password' => Hash::make('admin'),
            'teacher' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Illés Henrik',
            'email' => 's2@btn.hu',
            'password' => Hash::make('admin'),
            'teacher' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Pásztor Lajos',
            'email' => 's3@btn.hu',
            'password' => Hash::make('admin'),
            'teacher' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Szűcs Natália',
            'email' => 's4@btn.hu',
            'password' => Hash::make('admin'),
            'teacher' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Orbán Dorina Mária',
            'email' => 's5@btn.hu',
            'password' => Hash::make('admin'),
            'teacher' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Szőke Edina',
            'email' => 's6@btn.hu',
            'password' => Hash::make('admin'),
            'teacher' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
