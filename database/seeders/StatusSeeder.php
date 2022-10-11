<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Status::factory()->create(
            ['descricao' => 'Ativo']);

        \App\Models\Status::factory()->create(
            ['descricao' => 'Inativo']);
        
        \App\Models\Status::factory()->create(
            ['descricao' => 'Aguardando votação']);
        
        \App\Models\Status::factory()->create(
            ['descricao' => 'Em Votação']);

        \App\Models\Status::factory()->create(
            ['descricao' => 'Finalizada']);
    }
}