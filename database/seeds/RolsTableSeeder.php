<?php

use App\Rol;
use Illuminate\Database\Seeder;

class RolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([
        	'description1' => 'Administrador',
        	'description2' => 'Gerente',
        ]);

        Rol::create([
        	'description1' => 'TUTOR',
        	'description2' => 'PADRE',
        ]);
    }
}
