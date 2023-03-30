<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            'FirstName' => 'Ryle',
            'Lastname' => 'Fuentes',
            'Email' => 'admin@gmail.com',
            'Password' => password_hash(123, PASSWORD_BCRYPT),
            'role' => 2,
        ]);
    }
}
