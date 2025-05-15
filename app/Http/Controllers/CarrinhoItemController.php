<?php


namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\CarrinhoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoItemController extends Controller
{
    public function atualizarQuantidade(Request $request, CarrinhoItem $item)
    {
        $request->validate([
            'quantidade' => 'required|integer|min:1'
        ]);
        $item->quantidade = $request->input('quantidade');
        $item->save();
        return response()->json(['success' => true]);
    }
}
