<?php

// app/Http/Controllers/GrupoEconomicoController.php

// GrupoEconomicoController.php

// app/Http/Controllers/GrupoEconomicoController.php

namespace App\Http\Controllers;

use App\Models\GrupoEconomico;
use Illuminate\Http\Request;

class GrupoEconomicoController extends Controller
{
    public function index()
    {
        $grupos = GrupoEconomico::all();
        return view('grupos_economicos.index', compact('grupos'));
    }

    public function show($id)
    {
        $grupo = GrupoEconomico::findOrFail($id);
        return view('grupos_economicos.show', compact('grupo'));
    }

    public function create()
    {
        return view('grupos_economicos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $grupoEconomico = new GrupoEconomico();
        $grupoEconomico->nome = $request->nome;
        $grupoEconomico->save();

        return redirect()->to('/api/grupos_economicos')->with('success', 'Grupo economico criado com sucesso!');
    }

    public function edit($id)
    {
        $grupo = GrupoEconomico::findOrFail($id);
        return view('grupos_economicos.edit', compact('grupo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $grupo = GrupoEconomico::findOrFail($id);
        $grupo->nome = $request->nome;
        $grupo->updated_at = now();
        $grupo->save();

        $grupo->update($request->all());

        return redirect()->to('/api/grupos_economicos')->with('success', 'Grupo economico editado com sucesso!');
    }

    public function destroy($id)
    {
        $grupo = GrupoEconomico::findOrFail($id);
        $grupo->delete();

        return redirect()->back()->with('success', 'Grupo Econômico deletado com sucesso!');
    }
}
