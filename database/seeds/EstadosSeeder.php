<?php

use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            'estado' => 'Finalizado',
        ]);
        DB::table('estados')->insert([
            'estado' => 'En Ejecución',
        ]);
        DB::table('estados')->insert([
            'estado' => 'En Espera de Materiales',
        ]);
    }
}
