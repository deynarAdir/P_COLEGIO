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
        	'description2' => 'Gerente'
        ]);
        Rol::create([
            'description1' => 'Director',
            'description2' => 'Administracion'
        ]);
        Rol::create([
            'description1' => 'Docente',
            'description2' => 'Administracion'
        ]);
        Rol::create([
            'description1' => 'Estudiante',
            'description2' => 'Estudiante'
        ]);

        Rol::create([
        	'description1' => 'TUTOR',
        	'description2' => 'PADRE',
        ]);

        Rol::create([
            'description1' => 'Secretaria',
            'description2' => 'Administracion',
        ]);
        Rol::create([
            'description1' => 'Tesorero',
            'description2' => 'Administracion',
        ]);
    }
}
