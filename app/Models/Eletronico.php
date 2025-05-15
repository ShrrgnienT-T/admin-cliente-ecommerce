<?php

namespace App\Models;

use App\Http\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eletronico extends Model
{
    /** @use HasFactory<\Database\Factories\EletronicoFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
        'preco',
        'marca',
        'descricao',
        'subcategoria',
        'imagem'
    ];

    public function carrinhoItens()
    {
        return $this->morphMany(CarrinhoItem::class, 'item');
    }
}
