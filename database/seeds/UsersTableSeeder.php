<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@sipotopa.localhost',
            'password' => Hash::make('admin123'),
            'admin' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'eka',
            'email' => 'eka@email.com',
            'password' => Hash::make('eka123'),
            'address' => 'Jl. Anggur No. 5',
            'city' => 'Sleman',
            'state' => 'D. I. Yogyakarta',
            'country' => 'Indonesia',
            'pincode' => '50000',
            'mobile' => '081081081081'
        ]);
    }
}
