<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('debtors')->insert([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@foner.com',
            'telephone' => '+226 00-00-00-00',
            'password' => Hash::make('security'),
            // 'role' => 'SuperAdmin',
        ]);
    }
}
