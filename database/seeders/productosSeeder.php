<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class productosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("productos")->insert([
            'nombre' => 'Iphone 12',
            'descripcion'=> 'celular de alta gama',
            'precio'=> 1000,

        ]);
        DB::table("productos")->insert([
            'nombre' => 'oso de peluche',
            'descripcion'=> 'peluche de oso grande',
            'precio'=> 400,
            
        ]);
        DB::table("productos")->insert([
            'nombre' => 'televisor',
            'descripcion'=> 'televisor de 50 pulgadas',
            'precio'=> 1200.50,
            
        ]);
    }
}
