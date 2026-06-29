<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

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

        $this->call([
            TaskSeeder::class
        ]);
    }
}
