<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(15)->create();
        \App\Models\Cultivo::factory(8)->create();
        \App\Models\Parcela::factory(30)->create();
        \App\Models\Objeto::factory(10)->create();
        \App\Models\Trabajador::factory(5)->create();
        \App\Models\Producto::factory(5)->create();
        \App\Models\Actividad::factory(5)->create();
        \App\Models\Inventario::factory(5)->create();
        \App\Models\Historial_Cultivo::factory(50)->create();
        \App\Models\CuadernoCampo::factory(5)->create();
    }
}
