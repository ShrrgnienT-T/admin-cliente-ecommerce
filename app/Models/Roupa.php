<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roupa extends Model
{
    /** @use HasFactory<\Database\Factories\RoupaFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
        'preco',
        'tamanho',
        'cor',
        'descricao',
        'subcategoria',
        'imagem'
    ];

    public function carrinhoItens()
    {
        return $this->morphMany(CarrinhoItem::class, 'item');
    }
}
