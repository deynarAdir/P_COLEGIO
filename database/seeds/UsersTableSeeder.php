<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Ronald',
            'id_rol' => 1,
            'paternal' => 'Mollericona',
            'maternal' => 'Miranda',
            'gender' => 'Masculino',
            'address' => 'Calle: Gregorio Garcia Lanza',
            'ci' => '13408746',
            'cellphone' => '75273121',
        	'email' => 'roalmollericona@gmail.com',
        	'password' => bcrypt(12345678),
        ]);
        User::create([
            'name' => 'Ariel',
            'id_rol' => 4,
            'paternal' => 'Hidalgo',
            'maternal' => 'Miranda',
            'gender' => 'Masculino',
            'address' => 'Calle: Montaño',
            'ci' => '8307446',
            'cellphone' => '75273121',
            'email' => 'arwihimi@gmail.com',
            'password' => bcrypt(12345678),
        ]);
        User::create([
            'name' => 'Juana',
            'id_rol' => 4,
            'paternal' => 'Espinoza',
            'maternal' => 'Cari',
            'gender' => 'Femenino',
            'address' => 'Calle: Montaño',
            'ci' => '8444665',
            'cellphone' => '75273121',
            'email' => 'juesfe@gmail.com',
            'password' => bcrypt(12345678),
        ]);
        User::create([
            'name' => 'Julia',
            'id_rol' => 2,
            'paternal' => 'Miranda',
            'maternal' => 'Herrera',
            'gender' => 'Femenino',
            'address' => 'Calle: Montaño',
            'ci' => '9876543',
            'cellphone' => '75273121',
            'email' => 'jumihe@gmail.com',
            'password' => bcrypt(12345678),
        ]);
        User::create([
            'name' => 'Carlos',
            'id_rol' => 2,
            'paternal' => 'Chapo',
            'maternal' => 'Guzman',
            'gender' => 'Masculino',
            'address' => 'Calle: Montaño',
            'ci' => '3456789',
            'cellphone' => '75273121',
            'email' => 'cachgu@gmail.com',
            'password' => bcrypt(12345678),
        ]);
        User::create([
            'name' => 'Juan',
            'id_rol' => 5,
            'paternal' => 'Chapo',
            'maternal' => 'Guzman',
            'gender' => 'Masculino',
            'address' => 'Calle: Montaño',
            'ci' => '654321',
            'cellphone' => '75273121',
            'email' => 'juchgu1@gmail.com',
            'password' => bcrypt(12345678),
        ]);
    }
}
