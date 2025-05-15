<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eletronico>
 */
class EletronicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->word(),
            'preco' => $this->faker->randomFloat(2, 100, 5000),
            'marca' => $this->faker->company(),
            'descricao' => $this->faker->sentence(10),
            'subcategoria' => $this->faker->randomElement(['Celulares', 'TVs', 'Notebooks']),
            'imagem' => 'https://placehold.co/400x300?text=Eletronico+' . urlencode($this->faker->word()),
        ];
    }
}
