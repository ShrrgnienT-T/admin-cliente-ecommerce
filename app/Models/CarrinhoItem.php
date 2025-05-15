<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrinhoItem extends Model
{
    /** @use HasFactory<\Database\Factories\CarrinhoItemFactory> */
    use HasFactory;

    protected $table = 'carrinho_itens';
    protected $fillable = [
        'carrinho_id',
        'item_id',
        'item_type',
        'quantidade'
    ];

    public function carrinho()
    {
        return $this->belongsTo(Carrinho::class);
    }

    public function item()
    {
        return $this->morphTo();
    }
}
