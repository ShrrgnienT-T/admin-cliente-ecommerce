<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    /** @use HasFactory<\Database\Factories\LivroFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
        'preco',
        'autor',
        'editora',
        'descricao',
        'subcategoria',
        'imagem'
    ];

    public function carrinhoItens()
    {
        return $this->morphMany(CarrinhoItem::class, 'item');
    }
}
