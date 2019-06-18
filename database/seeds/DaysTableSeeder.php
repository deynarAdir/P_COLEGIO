<?php

use Illuminate\Database\Seeder;
use App\Day;

class DaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = [
        	'Lunes',
        	'Martes',
        	'Miercoles',
        	'Jueves',
        	'Viernes',
        	'Sabado'
        ];

        foreach ($days as $value) {
        	Day::create([
        		'description'=> $value
        	]);
        }
    }
}
