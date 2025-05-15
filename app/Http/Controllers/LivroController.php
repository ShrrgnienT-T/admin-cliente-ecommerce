<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use App\Http\Traits\FilterTrait;
use App\Models\Carrinho;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LivroController extends Controller
{
    use FilterTrait;

    public function index(Request $request, Livro $livros)
    {
        Gate::authorize('livro_acessar');
        $results = $livros->newQuery();
        self::filter($results, $request);
        return view('livros.index', [
            'livros' => $results->paginate(10)->withQueryString()
        ]);
    }

    public function show(Livro $livro)
    {
        Gate::authorize('livro_detalhar');
        return view('livros.show', compact('livro'));
    }

    public function create()
    {
        Gate::authorize('livro_criar');
        return view('livros.create');
    }

    public function edit(Livro $livro)
    {
        Gate::authorize('livro_editar');
        return view('livros.edit', compact('livro'));
    }

    public function store(Request $request)
    {
        Gate::authorize('livro_criar');
        $data = $request->validate([
            'nome' => 'required|string',
            'preco' => 'required|numeric',
            'autor' => 'nullable|string',
            'editora' => 'nullable|string',
            'descricao' => 'nullable|string',
        ]);
        $livro = Livro::create($data);
        return redirect()->route('livros.show', $livro)->with('success', 'Livro criado com sucesso!');
    }

    public function update(Request $request, Livro $livro)
    {
        Gate::authorize('livro_editar');
        $data = $request->validate([
            'nome' => 'sometimes|required|string',
            'preco' => 'sometimes|required|numeric',
            'autor' => 'nullable|string',
            'editora' => 'nullable|string',
            'descricao' => 'nullable|string',
        ]);
        $livro->update($data);
        return redirect()->route('livros.show', $livro)->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy(Livro $livro)
    {
        Gate::authorize('livro_apagar');
        $livro->delete();
        return redirect()->route('livros.index')->with('success', 'Livro removido com sucesso!');
    }

    public function listar(Request $request, Livro $livros)
    {
        Gate::authorize('livro_acessar_venda');
        $results = $livros->newQuery();
        self::filter($results, $request);
        return view('livros.venda', [
            'livros' => $results->paginate(12)->withQueryString()
        ]);
    }

    public function adicionarAoCarrinho(Request $request, Livro $livro)
    {
        $user = Auth::user();
        if (!$user) {
            if ($request->ajax()) {
                return response()->json(['message' => 'Faça login para adicionar ao carrinho.'], 401);
            }
            return redirect()->route('login');
        }
        $carrinho = Carrinho::firstOrCreate(['user_id' => $user->id]);
        $item = $carrinho->itens()->where('item_id', $livro->id)->where('item_type', Livro::class)->first();
        if ($item) {
            $item->quantidade += $request->input('quantidade', 1);
            $item->save();
        } else {
            $carrinho->itens()->create([
                'item_id' => $livro->id,
                'item_type' => Livro::class,
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
