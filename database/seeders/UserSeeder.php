<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Vasya Pupkin',
            'email' => 'demo@example.com',
            'password' => Hash::make('demo'),
            'contacts' => '+8 (800) 555-35-35',
        ];

        User::create($data);
    }
}
