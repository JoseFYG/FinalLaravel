<?php

namespace Database\Factories;

use App\Models\{Usuario, Perfil};
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usuario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $perfiles=Perfil::all('id');
        return [
            'nomusu'=>$this->faker->unique()->firstName(),
            'mail'=>$this->faker->unique()->freeEmail(),
            'localidad'=>$this->faker->city(),
            'perfil_id'=>$perfiles->get(rand(0, count($perfiles)-1))
        ];
    }
}
