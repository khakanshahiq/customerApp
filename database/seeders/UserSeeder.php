<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
            'name' =>'admin' ,
            'email' =>'admin@gmail.com',
            'password' => Hash::make('admin1234'),
            'role'=>"admin"
            ],
            [
                'name' =>'vendor' ,
                'email' =>'vendor@gmail.com',
                'password' => Hash::make('vendor1234'),
                'role'=>"vendor"
            ],
            [
                'name' =>'user' ,
                'email' =>'user@gmail.com',
                'password' => Hash::make('user1234'),
                'role'=>"user"
                ]

        ]);

    }
}
