<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    /** @use HasFactory<\Database\Factories\CarrinhoFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function itens()
    {
        return $this->hasMany(CarrinhoItem::class);
    }

    public function eletronicos()
    {
        return $this->hasManyThrough(Eletronico::class, CarrinhoItem::class, 'carrinho_id', 'id', 'id', 'item_id')
            ->where('carrinho_itens.item_type', Eletronico::class);
    }
    public function roupas()
    {
        return $this->hasManyThrough(Roupa::class, CarrinhoItem::class, 'carrinho_id', 'id', 'id', 'item_id')
            ->where('carrinho_itens.item_type', Roupa::class);
    }
    public function alimentos()
    {
        return $this->hasManyThrough(Alimento::class, CarrinhoItem::class, 'carrinho_id', 'id', 'id', 'item_id')
            ->where('carrinho_itens.item_type', Alimento::class);
    }
    public function livros()
    {
        return $this->hasManyThrough(Livro::class, CarrinhoItem::class, 'carrinho_id', 'id', 'id', 'item_id')
            ->where('carrinho_itens.item_type', Livro::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
