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
        User::factory()->create([
            'name' => 'mohamed author',
            'email' => 'mohamedauthor@gmail.com',
            'password' => bcrypt('123456789'),
            'role' => 'author',
        ]);

        User::factory()->create([
            'name' => 'mohamed Reader',
            'email' => 'mohamedreader@gmail.com',
            'password' => bcrypt('123456789'),
            'role' => 'reader',
        ]);
    }
}
