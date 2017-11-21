<?php

use Illuminate\Database\Seeder;
use App\User;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('areas')->insert([
            'area' => 'Catastro',
            'responsable'=> User::inRandomOrder()->first()->id
        ]);
        DB::table('areas')->insert([
            'area' => 'Educacion',
            'responsable'=> User::inRandomOrder()->first()->id
        ]);
        DB::table('areas')->insert([
            'area' => 'Obras Públicas',
            'responsable'=> User::inRandomOrder()->first()->id
        ]);
    }
}
