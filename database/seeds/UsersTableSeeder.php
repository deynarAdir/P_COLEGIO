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
        	'name' => 'a',
            'id_rol' => 1,
            'paternal' => 'Mof',
            'maternal' => 'Mirans',
            'gender' => 'Masculino',
            'address' => 'Calle: Gregorio ',
            'ci' => '1346',
            'cellphone' => '75273121',
        	'email' => 'ronald@gmail.com',
        	'password' => bcrypt(12345678),
        ]);
    }
}
