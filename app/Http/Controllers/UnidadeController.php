<?php

// app/Http/Controllers/UnidadeController.php

namespace App\Http\Controllers;

use App\Models\Unidade;
use App\Models\Bandeira;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    public function index()
    {
        $unidades = Unidade::all();
        return view('unidades.index', compact('unidades'));
    }

    public function create()
    {
        $bandeiras = Bandeira::all();
        return view('unidades.create', compact('bandeiras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_fantasia' => 'required|string|max:255',
            'razao_social' => 'required|string|max:255',
            'cnpj' => 'required|string|size:14|unique:unidades',
            'bandeira_id' => 'required|exists:bandeiras,id',
        ]);

        $unidade = new Unidade();
        $unidade->nome_fantasia = $request->nome_fantasia;
        $unidade->razao_social = $request->razao_social;
        $unidade->cnpj = $request->cnpj;
        $unidade->bandeira_id = $request->bandeira_id;
        $unidade->save();

        return redirect()->to('/api/unidades')->with('success', 'Unidade criada com sucesso!');
    }

    public function edit($id)
    {
        $unidade = Unidade::findOrFail($id);
        $bandeiras = Bandeira::all();
        return view('unidades.edit', compact('unidade', 'bandeiras'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_fantasia' => 'required|string|max:255',
            'razao_social' => 'required|string|max:255',
            'cnpj' => 'required|string|size:14|unique:unidades,cnpj,' . $id,
            'bandeira_id' => 'required|exists:bandeiras,id',
        ]);

        $unidade = Unidade::findOrFail($id);
        $unidade->nome_fantasia = $request->nome_fantasia;
        $unidade->razao_social = $request->razao_social;
        $unidade->cnpj = $request->cnpj;
        $unidade->bandeira_id = $request->bandeira_id;
        $unidade->updated_at = now();
        $unidade->save();

        $unidade->update($request->all());

        return redirect()->to('/api/unidades')->with('success', 'Unidade editada com sucesso!');
    }

    public function destroy($id)
    {
        $unidade = Unidade::findOrFail($id);
        $unidade->delete();

        return redirect()->route('unidades.index')->with('success', 'Unidade deletada com sucesso!');
    }
}
