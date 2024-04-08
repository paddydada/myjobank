<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            //Admin
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'admin',
                'status' => 'active',
            ],

            //employer
            [
                'name' => 'employer',
                'username' => 'employer',
                'email' => 'employer@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'employer',
                'status' => 'active',
            ],

            //job_seeker
            [
                'name' => 'jobseeker',
                'username' => 'jobseeker',
                'email' => 'jobseeker@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'job_seeker',
                'status' => 'active',
            ],

        ]);
    }
}
