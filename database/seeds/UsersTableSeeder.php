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
        	'name' => 'Deynar',
            'id_rol' => 1,
            'paternal' => 'Mamani',
            'maternal' => 'Tangara',
            'gender' => 'Masculino',
            'address' => 'Calle: Gregorio Garcia Lanza',
<<<<<<< HEAD
            'ci' => '65875421',
            'cellphone' => '78549865',
        	'email' => 'roalmollericona@gmail.com',
=======
            'ci' => '77577556',
            'cellphone' => '75273121',
        	'email' => 'deynaradirmt@gmail.com',
>>>>>>> 94da7ebfa6bb3b9c05f24076503c011fa9e70944
        	'password' => bcrypt(12345678),
        ]);
    }
}
