<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarrinhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Carrinho::factory(10)->create()->each(function ($carrinho) {
            $tipos = [
                \App\Models\Eletronico::class,
                \App\Models\Roupa::class,
                \App\Models\Alimento::class,
                \App\Models\Livro::class
            ];
            for ($i = 0; $i < rand(3, 6); $i++) {
                $tipo = $tipos[array_rand($tipos)];
                $item = $tipo::inRandomOrder()->first();
                if ($item) {
                    $carrinho->itens()->create([
                        'item_id' => $item->id,
                        'item_type' => $tipo,
                        'quantidade' => rand(1, 3)
                    ]);
                }
            }
        });
    }
}
