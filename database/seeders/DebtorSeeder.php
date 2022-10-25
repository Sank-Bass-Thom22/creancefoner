<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DebtorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('debtors')->insert([
            'firstname' => Str::random(10),
            'lastname' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'telephone' => '78-78-78-78',
            'role' => 'SuperAdmin',
            'password' => Hash::make('password'),
        ]);
        //Debtor::factory()->count(1)->create();
        // \App\Models\Debtor\Debtor::factory(1)->create();
    }
}
