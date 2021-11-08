<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createTestUser();
    }

    private function createTestUser()
    {
        User::create([
            'name' => 'TheSnafu',
            'first_name' => 'Patrik',
            'last_name' => 'Dörnyei',
            'email' => 'teszt@teszt.com',
            'password' => Hash::make('secret21'),
        ]);
    }
}
