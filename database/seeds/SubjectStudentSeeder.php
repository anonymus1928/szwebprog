<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subject_user')->insert([
            'user_id' => 4,
            'subject_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subject_user')->insert([
            'user_id' => 4,
            'subject_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subject_user')->insert([
            'user_id' => 4,
            'subject_id' => 9,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subject_user')->insert([
            'user_id' => 4,
            'subject_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        DB::table('subject_user')->insert([
            'user_id' => 5,
            'subject_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subject_user')->insert([
            'user_id' => 5,
            'subject_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subject_user')->insert([
            'user_id' => 5,
            'subject_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subject_user')->insert([
            'user_id' => 5,
            'subject_id' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('subject_user')->insert([
            'user_id' => 6,
            'subject_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subject_user')->insert([
            'user_id' => 6,
            'subject_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subject_user')->insert([
            'user_id' => 6,
            'subject_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('subject_user')->insert([
            'user_id' => 8,
            'subject_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subject_user')->insert([
            'user_id' => 8,
            'subject_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subject_user')->insert([
            'user_id' => 8,
            'subject_id' => 8,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subject_user')->insert([
            'user_id' => 8,
            'subject_id' => 9,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
