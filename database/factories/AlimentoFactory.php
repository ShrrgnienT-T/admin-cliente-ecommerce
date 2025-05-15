<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alimento>
 */
class AlimentoFactory extends Factory
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
            'preco' => $this->faker->randomFloat(2, 2, 100),
            'validade' => $this->faker->dateTimeBetween('+1 week', '+2 years')->format('Y-m-d'),
            'descricao' => $this->faker->sentence(6),
            'subcategoria' => $this->faker->randomElement(['Bebidas', 'Doces']),
            'imagem' => 'https://placehold.co/400x300?text=Alimento+' . urlencode($this->faker->word()),
        ];
    }
}
