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
            'ci' => '77577556',
            'cellphone' => '75273121',
        	'email' => 'deynaradirmt@gmail.com',
        	'password' => bcrypt(12345678),
        ]);
    }
}
