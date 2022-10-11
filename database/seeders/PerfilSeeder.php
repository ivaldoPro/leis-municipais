<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Perfil::factory()->create(
            ['descricao' => 'Administrador']);

        \App\Models\Perfil::factory()->create(
            ['descricao' => 'Vereador']);
    }
}