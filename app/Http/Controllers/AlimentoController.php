<?php

namespace App\Http\Controllers;

use App\Models\Alimento;
use Illuminate\Http\Request;
use App\Http\Traits\FilterTrait;
use App\Models\Carrinho;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AlimentoController extends Controller
{
    use FilterTrait;

    public function index(Request $request, Alimento $alimentos)
    {
        Gate::authorize('alimento_acessar');
        $results = $alimentos->newQuery();
        self::filter($results, $request);
        return view('alimentos.index', [
            'alimentos' => $results->paginate(10)->withQueryString()
        ]);
    }

    public function show(Alimento $alimento)
    {
        Gate::authorize('alimento_detalhar');
        return view('alimentos.show', compact('alimento'));
    }

    public function create()
    {
        Gate::authorize('alimento_criar');
        return view('alimentos.create');
    }

    public function edit(Alimento $alimento)
    {
        Gate::authorize('alimento_editar');
        return view('alimentos.edit', compact('alimento'));
    }

    public function store(Request $request)
    {
        Gate::authorize('alimento_criar');
        $data = $request->validate([
            'nome' => 'required|string',
            'preco' => 'required|numeric',
            'validade' => 'nullable|date',
            'descricao' => 'nullable|string',
        ]);
        $alimento = Alimento::create($data);
        return redirect()->route('alimentos.show', $alimento)->with('success', 'Alimento criado com sucesso!');
    }

    public function update(Request $request, Alimento $alimento)
    {
        Gate::authorize('alimento_editar');
        $data = $request->validate([
            'nome' => 'sometimes|required|string',
            'preco' => 'sometimes|required|numeric',
            'validade' => 'nullable|date',
            'descricao' => 'nullable|string',
        ]);
        $alimento->update($data);
        return redirect()->route('alimentos.show', $alimento)->with('success', 'Alimento atualizado com sucesso!');
    }

    public function destroy(Alimento $alimento)
    {
        Gate::authorize('alimento_apagar');
        $alimento->delete();
        return redirect()->route('alimentos.index')->with('success', 'Alimento removido com sucesso!');
    }

    public function listar(Request $request, Alimento $alimentos)
    {
        Gate::authorize('alimento_acessar_venda');
        $results = $alimentos->newQuery();
        self::filter($results, $request);
        return view('alimentos.venda', [
            'alimentos' => $results->paginate(12)->withQueryString()
        ]);
    }

    public function adicionarAoCarrinho(Request $request, Alimento $alimento)
    {
        $user = Auth::user();
        if (!$user) {
            if ($request->ajax()) {
                return response()->json(['message' => 'Faça login para adicionar ao carrinho.'], 401);
            }
            return redirect()->route('login');
        }
        $carrinho = Carrinho::firstOrCreate(['user_id' => $user->id]);
        $item = $carrinho->itens()->where('item_id', $alimento->id)->where('item_type', Alimento::class)->first();
        if ($item) {
            $item->quantidade += $request->input('quantidade', 1);
            $item->save();
        } else {
            $carrinho->itens()->create([
                'item_id' => $alimento->id,
                'item_type' => Alimento::class,
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
