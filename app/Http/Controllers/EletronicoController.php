<?php

namespace App\Http\Controllers;

use App\Models\Eletronico;
use Illuminate\Http\Request;
use App\Http\Traits\FilterTrait;
use App\Models\Carrinho;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EletronicoController extends Controller
{
    use FilterTrait;

    public function index(Request $request, Eletronico $eletronicos)
    {
        Gate::authorize('eletronico_acessar');
        $results = $eletronicos->newQuery();
        self::filter($results, $request);
        return view('eletronicos.index', [
            'eletronicos' => $results->paginate(10)->withQueryString()
        ]);
    }

    public function show(Eletronico $eletronico)
    {
        Gate::authorize('eletronico_detalhar');
        return view('eletronicos.show', compact('eletronico'));
    }

    public function create()
    {
        Gate::authorize('eletronico_criar');
        return view('eletronicos.create');
    }

    public function edit(Eletronico $eletronico)
    {
        Gate::authorize('eletronico_editar');
        return view('eletronicos.edit', compact('eletronico'));
    }

    public function store(Request $request)
    {
        Gate::authorize('eletronico_criar');
        $data = $request->validate([
            'nome' => 'required|string',
            'preco' => 'required|numeric',
            'marca' => 'nullable|string',
            'descricao' => 'nullable|string',
        ]);
        $eletronico = Eletronico::create($data);
        return redirect()->route('eletronicos.show', $eletronico)->with('success', 'Eletrônico criado com sucesso!');
    }

    public function update(Request $request, Eletronico $eletronico)
    {
        Gate::authorize('eletronico_editar');
        $data = $request->validate([
            'nome' => 'sometimes|required|string',
            'preco' => 'sometimes|required|numeric',
            'marca' => 'nullable|string',
            'descricao' => 'nullable|string',
        ]);
        $eletronico->update($data);
        return redirect()->route('eletronicos.show', $eletronico)->with('success', 'Eletrônico atualizado com sucesso!');
    }

    public function destroy(Eletronico $eletronico)
    {
        Gate::authorize('eletronico_apagar');
        $eletronico->delete();
        return redirect()->route('eletronicos.index')->with('success', 'Eletrônico removido com sucesso!');
    }

    public function listar(Request $request, Eletronico $eletronicos)
    {
        Gate::authorize('eletronico_acessar_venda');
        $results = $eletronicos->newQuery();
        self::filter($results, $request);
        return view('eletronicos.venda', [
            'eletronicos' => $results->paginate(12)->withQueryString()
        ]);
    }

    public function adicionarAoCarrinho(Request $request, Eletronico $eletronico)
    {
        $user = Auth::user();
        if (!$user) {
            if ($request->ajax()) {
                return response()->json(['message' => 'Faça login para adicionar ao carrinho.'], 401);
            }
            return redirect()->route('login');
        }
        $carrinho = Carrinho::firstOrCreate(['user_id' => $user->id]);
        $item = $carrinho->itens()->where('item_id', $eletronico->id)->where('item_type', Eletronico::class)->first();
        if ($item) {
            $item->quantidade += $request->input('quantidade', 1);
            $item->save();
        } else {
            $carrinho->itens()->create([
                'item_id' => $eletronico->id,
                'item_type' => Eletronico::class,
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
