<?php

use Illuminate\Database\Seeder;
use App\Marca;
class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        /*
        DB::table('marcas')->insert([
            'nombre'=>'Seat',
            'pais'=>'España'
        ]);
        */
        //Vaciamos las tablas
        //descativamos las constraints

        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        DB::table('marcas')->truncate(); 
        DB::statement("SET FOREIGN_KEY_CHECKS=1;");  

        Marca::create([
            'nombre'=>'Seat',
            'pais'=>'España'
        ]);
        Marca::create([
            'nombre'=>'Renault',
            'pais'=>'Francia'
        ]);

        Marca::create([
            'nombre'=>'VolksWagen',
            'pais'=>'Alemania'
        ]);

        Marca::create([
            'nombre'=>'Citroen',
            'pais'=>'Francia'
        ]);

        Marca::create([
            'nombre'=>'Fiat',
            'pais'=>'Italia'
        ]);

        Marca::create([
            'nombre'=>'Opel',
            'pais'=>'Alemania'
        ]);

        Marca::create([
            'nombre'=>'Ford',
            'pais'=>'USA'
        ]);

        Marca::create([
            'nombre'=>'Toyota',
            'pais'=>'Japon'
        ]);
    }
}
