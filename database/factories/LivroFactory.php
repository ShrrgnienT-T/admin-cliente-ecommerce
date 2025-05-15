<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livro>
 */
class LivroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->sentence(2),
            'preco' => $this->faker->randomFloat(2, 10, 300),
            'autor' => $this->faker->name(),
            'editora' => $this->faker->company(),
            'descricao' => $this->faker->sentence(12),
            'subcategoria' => $this->faker->randomElement(['Ficção', 'Não Ficção', 'Romance', 'Autoajuda']),
            'imagem' => 'https://placehold.co/400x300?text=Livro+' . urlencode($this->faker->word()),
        ];
    }
}
