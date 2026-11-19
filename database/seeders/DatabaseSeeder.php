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
        // As quatro pessoas do projeto original
    foreach (['João', 'Maria', 'Paulo', 'Ana'] as $nome) {
        Pessoa::create(['nome' => $nome]);
    }
    // Administrador (nível 2). A senha é criptografada pelo cast 'hashed'
    User::create([
        'name' => 'Admin',
        'email' => 'admin@exemplo.com',
        'password' => 'senha1234',
        'nivel_acesso' => 2,
    ]);
    // Usuário comum (nível 1)
    User::create([
        'name' => 'Teste',
        'email' => 'teste@exemplo.com',
        'password' => 'senha1234',
        'nivel_acesso' => 1,
    ]);
}