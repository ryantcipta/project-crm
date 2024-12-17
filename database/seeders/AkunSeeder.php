<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = [
            [
                'username' => 'mdcrm',
                'kode_dealer' => '0000',
                'nama_dealer' => 'Admin Dealer',
                'level'=>'MD',
                'password'=> bcrypt('mdcrm2024'),
            ],
            [
                'username' => 'aum_07525',
                'kode_dealer' => '07525',
                'nama_dealer' => 'Anugrah Utama Motor',
                'level'=>'D',
                'password'=> bcrypt('aum123@'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
