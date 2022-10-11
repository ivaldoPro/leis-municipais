<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Categoria::factory()->create(
            ['nome' => 'Requerimento']);

        \App\Models\Categoria::factory()->create(
            ['nome' => 'Indicação']);
    }
}