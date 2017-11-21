<?php

use Illuminate\Database\Seeder;


class ExpedientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Expediente::class, 10)->create();
    }
}
