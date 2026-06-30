<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'bapol',
            'email' => 'bapol@gmail.com',
            'password' => 'bapol123',
        ]);
        User::create([
            'name' => 'sogol',
            'email' => 'sogol@gmail.com',
            'password' => 'sogol123',
        ]);
        User::create([
            'name' => 'bagus',
            'email' => 'bagus@gmail.com',
            'password' => 'bagus123',
        ]);
        User::create([
            'name' => 'citra',
            'email' => 'citra@gmail.com',
            'password' => 'citra123',
        ]);
        User::create([
            'name' => 'dedi',
            'email' => 'dedi@gmail.com',
            'password' => 'dedi123',
        ]);
        User::create([
            'name' => 'eka',
            'email' => 'eka@gmail.com',
            'password' => 'eka123',
        ]);
        User::create([
            'name' => 'fajar',
            'email' => 'fajar@gmail.com',
            'password' => 'fajar123',
        ]);
        User::create([
            'name' => 'gita',
            'email' => 'gita@gmail.com',
            'password' => 'gita123',
        ]);
        User::create([
            'name' => 'hendra',
            'email' => 'hendra@gmail.com',
            'password' => 'hendra123',
        ]);
        User::create([
            'name' => 'intan',
            'email' => 'intan@gmail.com',
            'password' => 'intan123',
        ]);
        User::create([
            'name' => 'joko',
            'email' => 'joko@gmail.com',
            'password' => 'joko123',
        ]);
        User::create([
            'name' => 'kiki',
            'email' => 'kiki@gmail.com',
            'password' => 'kiki123',
        ]);
    }
}
