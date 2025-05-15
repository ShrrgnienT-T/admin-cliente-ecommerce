<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Alimento extends Model
{
    /** @use HasFactory<\Database\Factories\AlimentoFactory> */
    use HasFactory, HasRoles;

    protected $fillable = [
        'nome',
        'preco',
        'validade',
        'descricao',
        'subcategoria',
        'imagem'
    ];

    public function carrinhoItens()
    {
        return $this->morphMany(CarrinhoItem::class, 'item');
    }
}
