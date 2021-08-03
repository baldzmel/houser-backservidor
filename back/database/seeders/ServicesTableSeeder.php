<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'id_service' => 1,
            'title' => "Carpintería",
            'img' => 'carpinteria.jpg',
            'alt' => 'Manos de un carpintero trabajando'
        ]);
        Service::create([
            'id_service' => 2,
            'title' => "Técnico PC",
            'img' => 'servicio-compu.png',
            'alt' => 'Computadora sobre un escritorio'
        ]);
        Service::create([
            'id_service' => 3,
            'title' => "Pinturería",
            'img' => 'alba.png',
            'alt' => 'Pintor apoyado sobre una pared'
        ]);
        Service::create([
            'id_service' => 4,
            'title' => "Aires acondicionados",
            'img' => 'aires.png',
            'alt' => 'Mujer tocando un aire acondicionado'
        ]);
        Service::create([
            'id_service' => 5,
            'title' => "Flete",
            'img' => 'flete.png',
            'alt' => '2 hombres cargando cosas a un camión'
        ]);
    }
}
