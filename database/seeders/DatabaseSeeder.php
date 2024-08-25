<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Cria 10 usuários com valores aleatórios
//        User::factory(10)->create();

        // Cria um usuário com valores específicos
        User::factory()->create([
            'first_name' => 'Leo',
            'last_name' => 'Medeiros',
            'email' => 'leo.medeiros@example.com', // Use um e-mail único
        ]);
    }
}
