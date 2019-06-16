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
            'ci' => '65875421',
            'cellphone' => '78549865',
        	'email' => 'roalmollericona@gmail.com',
        	'password' => bcrypt(12345678),
        ]);
    }
}
