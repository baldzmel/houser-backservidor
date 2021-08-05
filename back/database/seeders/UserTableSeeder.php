<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::create([
            'id_user' => 1,
            'password' => Hash::make('admin'),
            'email' => "admin@mail.com",
            'name' => "Mateo",
            'lastname' => "Maturano",
            'telephone' => "155550010",
            'quote' => "Soy el Administrador de Houser",
            'birthday' => "1990-06-01",
            'address' => "Cabildo 2500",
            'region' => "CF",
            'locality' => 'Buenos Aires',
            'portrait' => "carpi1.jpg",
            'avatar' => "yo.jpg",
            'alt' => "foto de perfil del usuario",
            'fk_level' => 1
        ]);
        Users::create([
            'id_user' => 2,
            'password' => Hash::make('user'),
            'email' => "user@mail.com",
            'name' => "Carolina",
            'lastname' => "Gomez",
            'telephone' => "155550011",
            'quote' => "Soy un Usuario de prueba",
            'birthday' => "1990-05-28",
            'address' => "conde 729",
            'region' => "CF",
            'locality' => 'Buenos Aires',
            'portrait' => "cold1.jpg",
            'avatar' => "perfil1.jpg",
            'alt' => "foto de perfil del usuario",
            'fk_level' => 2
        ]);
        Users::create([
            'id_user' => 3,
            'password' => Hash::make('user'),
            'email' => "professional@mail.com",
            'name' => "Javier",
            'lastname' => "Profesional",
            'telephone' => "155550012",
            'quote' => "Soy Técnico de PC",
            'birthday' => "1988-10-15",
            'address' => "Blanco encalada 3000",
            'region' => "CF",
            'locality' => 'Buenos Aires',
            'portrait' => "compu1.jpg",
            'avatar' => "javier.jpg",
            'alt' => "foto de perfil del usuario",
            'fk_level' => 3,
            'fk_service' => 2,
            'total_rating' => 3.7
        ]);
        Users::create([
            'id_user' => 4,
            'password' => Hash::make('user'),
            'email' => "laurareggiano@mimail.com",
            'name' => "Laura",
            'lastname' => "Reggiano",
            'telephone' => "155550012",
            'quote' => "Soy Ténica de Pc",
            'birthday' => "1988-10-15",
            'address' => "Freire 2400",
            'region' => "CF",
            'locality' => 'Buenos Aires',
            'portrait' => "compu2.jpg",
            'avatar' => "laura.jpg",
            'alt' => "foto de perfil del usuario",
            'fk_level' => 3,
            'fk_service' => 2,
            'total_rating' => 4.7
        ]);
        Users::create([
            'id_user' => 5,
            'password' => Hash::make('user'),
            'email' => "jorgelaurenzo12@mimail.com",
            'name' => "Jorge",
            'lastname' => "Laurenzo",
            'telephone' => "155550012",
            'quote' => "Soy Carpintero",
            'birthday' => "1988-10-15",
            'address' => "Freire 2500",
            'region' => "CF",
            'locality' => 'Buenos Aires',
            'portrait' => "carpi1.jpg",
            'avatar' => "jorge.jpg",
            'alt' => "foto de perfil del usuario",
            'fk_level' => 3,
            'fk_service' => 1,
            'total_rating' => 2.9
        ]);
        Users::create([
            'id_user' => 6,
            'password' => Hash::make('user'),
            'email' => "raulrak@mimail.com",
            'name' => "Raul",
            'lastname' => "Rakora",
            'telephone' => "155550012",
            'quote' => "Soy Carpintero y Ebanista",
            'birthday' => "1988-10-15",
            'address' => "Monroe 2100",
            'region' => "CF",
            'locality' => 'Buenos Aires',
            'portrait' => "carpi2.jpg",
            'avatar' => "raul.jpg",
            'alt' => "foto de perfil del usuario",
            'fk_level' => 3,
            'fk_service' => 1,
            'total_rating' => 5
        ]);
        Users::create([
            'id_user' => 7,
            'password' => Hash::make('user'),
            'email' => "matiburzaco@mimail.com",
            'name' => "Matias",
            'lastname' => "Buzcaco",
            'telephone' => "155550012",
            'quote' => "Soy Pintor de casas y establecimientos",
            'birthday' => "1988-10-15",
            'address' => "Olazabal 1100",
            'region' => "CF",
            'locality' => 'Buenos Aires',
            'portrait' => "pintu1.jpg",
            'avatar' => "matias.jpg",
            'alt' => "foto de perfil del usuario",
            'fk_level' => 3,
            'fk_service' => 3,
            'total_rating' => 4.1
        ]);
        Users::create([
            'id_user' => 8,
            'password' => Hash::make('user'),
            'email' => "pablojulens@minimail.com",
            'name' => "Pablo",
            'lastname' => "Julens",
            'telephone' => "155550010",
            'quote' => "Soy Pintor hace 10 años",
            'birthday' => "1988-10-15",
            'address' => "Conde 600",
            'region' => "CF",
            'locality' => 'Buenos Aires',
            'portrait' => "pintu2.jpg",
            'avatar' => "pablo.jpg",
            'alt' => "foto de perfil del usuario",
            'fk_level' => 3,
            'fk_service' => 3,
            'total_rating' => 0
        ]);
        Users::create([
            'id_user' => 9,
            'password' => Hash::make('user'),
            'email' => "valeriaandreeti@gmail.com",
            'name' => "Valeria",
            'lastname' => "Andreeti",
            'telephone' => "155550010",
            'quote' => "Soy Carpintera profesional hace más de 2 años",
            'birthday' => "1988-10-15",
            'address' => "Cespedes 3000",
            'region' => "CF",
            'locality' => 'Buenos Aires',
            'portrait' => "carpi3.jpg",
            'avatar' => "valeria.jpg",
            'alt' => "foto de perfil del usuario",
            'fk_level' => 3,
            'fk_service' => 1,
            'total_rating' => 2.5
        ]);
        Users::create([
            'id_user' => 10,
            'password' => Hash::make('user'),
            'email' => "gladysenglish@gmail.com",
            'name' => "Gladys",
            'lastname' => "Lamanuch",
            'telephone' => "155550010",
            'quote' => "Experta en carpientería de mesitas ratonas y estantes",
            'birthday' => "1988-10-15",
            'address' => "Cramer 828",
            'region' => "CF",
            'locality' => 'Buenos Aires',
            'portrait' => "carpi4.jpg",
            'avatar' => "gladys.jpg",
            'alt' => "foto de perfil del usuario",
            'fk_level' => 3,
            'fk_service' => 1,
            'total_rating' => 4
        ]);
        Users::create([
            'id_user' => 11,
            'password' => Hash::make('user'),
            'email' => "teresa@gmail.com",
            'name' => "Teresa",
            'lastname' => "Salendis",
            'telephone' => "155550010",
            'quote' => "He reparado diversos electrodomésticos a lo largo de 15 años",
            'birthday' => "1988-10-15",
            'address' => "Cabildo 3000",
            'region' => "CF",
            'locality' => 'Buenos Aires',
            'portrait' => "cold1.jpg",
            'avatar' => "teresa.jpg",
            'alt' => "foto de perfil del usuario",
            'fk_level' => 3,
            'fk_service' => 4,
            'total_rating' => 5
        ]);
        Users::create([
            'id_user' => 12,
            'password' => Hash::make('user'),
            'email' => "fedelew@gmail.com",
            'name' => "Federico",
            'lastname' => "Lewis",
            'telephone' => "155550010",
            'quote' => "¡Reparador especial de Aires Acondicionados!",
            'birthday' => "1988-10-15",
            'address' => "Ciudad de la paz 428",
            'region' => "CF",
            'locality' => 'Buenos Aires',
            'portrait' => "cold2.jpg",
            'avatar' => "fede.jpg",
            'alt' => "foto de perfil del usuario",
            'fk_level' => 3,
            'fk_service' => 4,
            'total_rating' => 4.6
        ]);
        Users::create([
            'id_user' => 13,
            'password' => Hash::make('user'),
            'email' => "manunande@gmail.com",
            'name' => "Manuel",
            'lastname' => "Nandez",
            'telephone' => "155550010",
            'quote' => "Reparo todo tipo de electrodomésticos: Aires - Heladeras - Hornos y mas!",
            'birthday' => "1988-10-15",
            'address' => "Vidal 2487",
            'region' => "CF",
            'locality' => 'Buenos Aires',
            'portrait' => "cold3.jpg",
            'avatar' => "manuel.jpg",
            'alt' => "foto de perfil del usuario",
            'fk_level' => 3,
            'fk_service' => 4,
            'total_rating' => 3.8
        ]);
        Users::create([
            'id_user' => 14,
            'password' => Hash::make('user'),
            'email' => "ramirogus@gmail.com",
            'name' => "Ramiro",
            'lastname' => "Gustamonte",
            'telephone' => "155550010",
            'quote' => "Servicio de fletería a domicilio, el mejor servicio en Houser",
            'birthday' => "1988-10-15",
            'address' => "Freire 2300",
            'region' => "CF",
            'locality' => 'Buenos Aires',
            'portrait' => "flete1.jpg",
            'avatar' => "ramiro.jpg",
            'alt' => "foto de perfil del usuario",
            'fk_level' => 3,
            'fk_service' => 5,
            'total_rating' => 4.5
        ]);
        Users::create([
            'id_user' => 15,
            'password' => Hash::make('user'),
            'email' => "nicolastofe@gmail.com",
            'name' => "Nicolas",
            'lastname' => "Tofe",
            'telephone' => "155550010",
            'quote' => "Servicio de Flete con experiencia de más de 20 años",
            'birthday' => "1988-10-15",
            'address' => "Superi 728",
            'region' => "CF",
            'locality' => 'Buenos Aires',
            'portrait' => "flete2.jpg",
            'avatar' => "nicolas.jpg",
            'alt' => "foto de perfil del usuario",
            'fk_level' => 3,
            'fk_service' => 5,
            'total_rating' => 4
        ]);
    }
}

