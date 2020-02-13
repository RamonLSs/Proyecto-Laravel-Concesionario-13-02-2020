<?php

use Illuminate\Database\Seeder;
use App\Coche;
use Illuminate\Support\Facades\DB;

class CocheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        DB::table('coches')->truncate(); 
        DB::statement("SET FOREIGN_KEY_CHECKS=1;");
        
        Coche::create([
            'matricula'=>'1234-JJJ',
            'modelo'=>'Leon',
            'color'=>'Rojo',
            'tipo'=>'Diesel',
            'klms'=>'1231',
            'pvp'=>'13490',
            'marca_id'=>'1'
        ]);
        Coche::create([
            'matricula'=>'0987-CDS',
            'modelo'=>'Ibiza',
            'color'=>'Negro',
            'tipo'=>'Gasolina',
            'klms'=>'45000',
            'pvp'=>'7800',
            'marca_id'=>'1'
        ]);
        Coche::create([
            'matricula'=>'4167-HJK',
            'modelo'=>'Meganne',
            'color'=>'Azul',
            'tipo'=>'Diesel',
            'klms'=>'12000',
            'pvp'=>'12300',
            'marca_id'=>'2'
        ]);
        Coche::create([
            'matricula'=>'5017-BNL',
            'modelo'=>'Golf',
            'color'=>'Gris',
            'tipo'=>'Diesel',
            'klms'=>'78900',
            'pvp'=>'3456',
            'marca_id'=>'3'
        ]);
        Coche::create([
            'matricula'=>'1045-DNS',
            'modelo'=>'C4',
            'color'=>'Azul',
            'tipo'=>'Gasolina',
            'klms'=>'45678',
            'pvp'=>'9087',
            'marca_id'=>'4'
        ]);
        Coche::create([
            'matricula'=>'1345-HJK',
            'modelo'=>'Auris',
            'color'=>'Marron',
            'tipo'=>'Hibrido',
            'klms'=>'23000',
            'pvp'=>'5678',
            'marca_id'=>'8'
        ]);
        Coche::create([
            'matricula'=>'8971-KJZ',
            'modelo'=>'Focus',
            'color'=>'Plata',
            'tipo'=>'Diesel',
            'klms'=>'2345',
            'pvp'=>'12000',
            'marca_id'=>'7'
        ]);
        Coche::create([
            'matricula'=>'1111-CSS',
            'modelo'=>'Uno',
            'color'=>'Negro',
            'tipo'=>'Gasolina',
            'klms'=>'11111',
            'pvp'=>'4500',
            'marca_id'=>'5'
        ]);
        Coche::create([
            'matricula'=>'1675-LCD',
            'modelo'=>'Astra',
            'color'=>'Blanco',
            'tipo'=>'gasolina',
            'klms'=>'1000',
            'pvp'=>'13000',
            'marca_id'=>'6'
        ]);
        Coche::create([
            'matricula'=>'3490-HZX',
            'modelo'=>'Leon',
            'color'=>'Gris',
            'tipo'=>'Gasolina',
            'klms'=>'12000',
            'pvp'=>'3456',
            'marca_id'=>'1'
        ]);
        Coche::create([
            'matricula'=>'0090-HZX',
            'modelo'=>'Wingston',
            'color'=>'Gris',
            'tipo'=>'Gasolina',
            'klms'=>'12000',
            'pvp'=>'3456'
        ]);
        
        
    }
}
