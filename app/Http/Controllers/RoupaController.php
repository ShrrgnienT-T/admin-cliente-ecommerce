<?php

namespace App\Http\Controllers;

use App\Models\Roupa;
use Illuminate\Http\Request;
use App\Http\Traits\FilterTrait;
use App\Models\Carrinho;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class RoupaController extends Controller
{
    use FilterTrait;

    public function index(Request $request, Roupa $roupas)
    {
        Gate::authorize('roupa_acessar');
        $results = $roupas->newQuery();
        self::filter($results, $request);
        return view('roupas.index', [
            'roupas' => $results->paginate(10)->withQueryString()
        ]);
    }

    public function show(Roupa $roupa)
    {
        Gate::authorize('roupa_detalhar');
        return view('roupas.show', compact('roupa'));
    }

    public function create()
    {
        Gate::authorize('roupa_criar');
        return view('roupas.create');
    }

    public function edit(Roupa $roupa)
    {
        Gate::authorize('roupa_editar');
        return view('roupas.edit', compact('roupa'));
    }

    public function store(Request $request)
    {
        Gate::authorize('roupa_criar');
        $data = $request->validate([
            'nome' => 'required|string',
            'preco' => 'required|numeric',
            'tamanho' => 'nullable|string',
            'cor' => 'nullable|string',
            'descricao' => 'nullable|string',
        ]);
        $roupa = Roupa::create($data);
        return redirect()->route('roupas.show', $roupa)->with('success', 'Roupa criada com sucesso!');
    }

    public function update(Request $request, Roupa $roupa)
    {
        Gate::authorize('roupa_editar');
        $data = $request->validate([
            'nome' => 'sometimes|required|string',
            'preco' => 'sometimes|required|numeric',
            'tamanho' => 'nullable|string',
            'cor' => 'nullable|string',
            'descricao' => 'nullable|string',
        ]);
        $roupa->update($data);
        return redirect()->route('roupas.show', $roupa)->with('success', 'Roupa atualizada com sucesso!');
    }

    public function destroy(Roupa $roupa)
    {
        Gate::authorize('roupa_apagar');
        $roupa->delete();
        return redirect()->route('roupas.index')->with('success', 'Roupa removida com sucesso!');
    }

    public function listar(Request $request, Roupa $roupas)
    {
        Gate::authorize('roupa_acessar_venda');
        $results = $roupas->newQuery();
        self::filter($results, $request);
        return view('roupas.venda', [
            'roupas' => $results->paginate(12)->withQueryString()
        ]);
    }

    public function adicionarAoCarrinho(Request $request, Roupa $roupa)
    {
        $user = Auth::user();
        if (!$user) {
            if ($request->ajax()) {
                return response()->json(['message' => 'Faça login para adicionar ao carrinho.'], 401);
            }
            return redirect()->route('login');
        }
        $carrinho = Carrinho::firstOrCreate(['user_id' => $user->id]);
        $item = $carrinho->itens()->where('item_id', $roupa->id)->where('item_type', Roupa::class)->first();
        if ($item) {
            $item->quantidade += $request->input('quantidade', 1);
            $item->save();
        } else {
            $carrinho->itens()->create([
                'item_id' => $roupa->id,
                'item_type' => Roupa::class,
                'quantidade' => $request->input('quantidade', 1),
            ]);
        }
        $cartCount = $carrinho->itens()->sum('quantidade');
        session(['cart_count' => $cartCount]);

        if ($request->ajax()) {
            return response()->json([
                'message' => 'Produto adicionado ao carrinho!',
                'cart_count' => $cartCount
            ]);
        }

        return redirect()->back()->with('success', 'Produto adicionado ao carrinho!');
    }
}
