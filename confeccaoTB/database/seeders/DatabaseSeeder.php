<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cliente;
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
        \App\Models\Cliente::factory(10)->create();
        User::factory()->create([
            'name' => 'Bruno',
            'email' => 'bruno@teste.com',
            // 'password' => 'teste@1234',
        ]);
    }
}
