<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Carrinho;
use App\Models\Eletronico;
use App\Models\Roupa;
use App\Models\Alimento;
use App\Models\Livro;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarrinhoItem>
 */
class CarrinhoItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipos = [Eletronico::class, Roupa::class, Alimento::class, Livro::class];
        $itemType = $this->faker->randomElement($tipos);
        $item = $itemType::factory()->create();
        return [
            'carrinho_id' => Carrinho::factory(),
            'item_id' => $item->id,
            'item_type' => $itemType,
            'quantidade' => $this->faker->numberBetween(1, 5),
        ];
    }
}
