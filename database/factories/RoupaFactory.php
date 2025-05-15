<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Roupa>
 */
class RoupaFactory extends Factory
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
            'preco' => $this->faker->randomFloat(2, 20, 500),
            'tamanho' => $this->faker->randomElement(['P', 'M', 'G', 'GG']),
            'cor' => $this->faker->safeColorName(),
            'descricao' => $this->faker->sentence(8),
            'subcategoria' => $this->faker->randomElement(['Masculino', 'Feminino', 'Infantil']),
            'imagem' => 'https://placehold.co/400x300?text=Roupa+' . urlencode($this->faker->word()),
        ];
    }
}
