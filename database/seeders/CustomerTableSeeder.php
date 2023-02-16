<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class CustomerTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'name' => 'rinesh',
            'email' => 'riteshl@doe.com',
            'gender'=>'male',
            'address'=>'104,Gandhi road',
            'state'=>'Gujarat',
            'country'=>'Turkey',
            'dob'=>'1993-11-07',
            'password' => Hash::make('abcd@122'),
            'city'=>'Ahmedabad'
        ]);
    }
}
