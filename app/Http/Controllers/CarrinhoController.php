<?php


namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\CarrinhoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $carrinho = Carrinho::firstOrCreate(['user_id' => $user->id]);
        $itens = $carrinho->itens()->with('item')->get();

        // Calcula o total do carrinho
        $total = $itens->reduce(function ($carry, $item) {
            return $carry + (($item->item->preco ?? 0) * $item->quantidade);
        }, 0);

        return view('carrinho.index', compact('carrinho', 'itens', 'total'));
    }

    public function remover($id)
    {
        $item = CarrinhoItem::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success', 'Item removido do carrinho!');
    }

    public function limpar()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $carrinho = Carrinho::where('user_id', $user->id)->first();
        if ($carrinho) {
            $carrinho->itens()->delete();
        }
        session(['cart_count' => 0]);
        return redirect()->back()->with('success', 'Carrinho esvaziado!');
    }

    public function quantidadeCarrinho()
    {
        $user = Auth::user();
        if (!$user) {
            return 0;
        }
        $carrinho =Carrinho::where('user_id', $user->id)->first();
        return $carrinho ? $carrinho->itens()->sum('quantidade') : 0;
    }
}
