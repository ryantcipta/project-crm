<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'kode_dealer' => '0000',
            'nama_dealer' => 'Admin Dealer',
            'username' => 'mdcrm',
            'password' => Hash::make('mdcrm2024'), // Ubah sesuai kebutuhan
        ]);
    }
}
