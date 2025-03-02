<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Personaje;

class PersonajesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $personajes = [
            [
                'nombre' => 'Isaac',
                'descripcion' => 'El personaje principal, con estadísticas equilibradas.',
                'vida_maxima' => 3,
                'danio' => 3.5,
                'velocidad' => 1.0,
            ],
            [
                'nombre' => 'Magdalene',
                'descripcion' => 'Tiene más vida pero es más lenta.',
                'vida_maxima' => 4,
                'danio' => 3.5,
                'velocidad' => 0.85,
            ],
            [
                'nombre' => 'Cain',
                'descripcion' => 'Más suerte y velocidad, pero menos vida.',
                'vida_maxima' => 2,
                'danio' => 3.5,
                'velocidad' => 1.3,
            ],
            [
                'nombre' => 'Judas',
                'descripcion' => 'Alto daño pero muy poca vida.',
                'vida_maxima' => 1,
                'danio' => 4.0,
                'velocidad' => 1.0,
            ],
            [
                'nombre' => 'Eve',
                'descripcion' => 'Baja vida y daño, pero se vuelve más fuerte con poca vida.',
                'vida_maxima' => 2,
                'danio' => 2.5,
                'velocidad' => 1.2,
            ],
            [
                'nombre' => 'Samson',
                'descripcion' => 'Gana más daño al recibir golpes.',
                'vida_maxima' => 3,
                'danio' => 3.5,
                'velocidad' => 1.1,
            ],
            [
                'nombre' => 'Azazel',
                'descripcion' => 'Empieza con vuelo y un ataque láser de corto alcance.',
                'vida_maxima' => 3,
                'danio' => 5.0,
                'velocidad' => 1.2,
            ],
            [
                'nombre' => 'Lazarus',
                'descripcion' => 'Puede revivir con estadísticas diferentes.',
                'vida_maxima' => 3,
                'danio' => 3.5,
                'velocidad' => 1.0,
            ],
            [
                'nombre' => 'Eden',
                'descripcion' => 'Empieza con estadísticas y objetos aleatorios.',
                'vida_maxima' => rand(1, 4),
                'danio' => rand(2.5, 5.0),
                'velocidad' => rand(0.85, 1.5),
            ],
        ];

        foreach ($personajes as $personaje) {
            Personaje::create($personaje);
        }
    }
}
