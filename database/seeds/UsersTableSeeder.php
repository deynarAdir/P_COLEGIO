<?php

use App\User;
use App\Document;
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
        	'name' => 'Deynar',
            'id_rol' => 1,
            'paternal' => 'Mamani',
            'maternal' => 'Tangara',
            'gender' => 'Masculino',
            'address' => 'Calle: Gregorio Garcia Lanza',
            'ci' => '65875421',
            'cellphone' => '78549865',
        	'email' => 'deynaradirmt@gmail.com',
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
