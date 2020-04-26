<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name' => 'Test Subject #1',
            'description' => 'Description of Test Subject #1',
            'code' => 'IK-TST001',
            'credit' => 5,
            'public' => true,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Test Subject #2',
            'description' => 'Description of Test Subject #2',
            'code' => 'IK-TST002',
            'credit' => 5,
            'public' => true,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Test Subject #3',
            'description' => 'Description of Test Subject #3',
            'code' => 'IK-TST003',
            'credit' => 5,
            'public' => true,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
