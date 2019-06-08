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
            'ci' => '69860335',
            'cellphone' => '75273121',
        	'email' => 'garbo@gmail.com',
        	'password' => bcrypt(12345678),
        ]);
    }
}
