<?php

// app/Http/Controllers/BandeiraController.php

// app/Http/Controllers/BandeiraController.php

namespace App\Http\Controllers;

use App\Models\Bandeira;
use App\Models\GrupoEconomico;
use Illuminate\Http\Request;

class BandeiraController extends Controller
{
    public function index()
    {
        $bandeiras = Bandeira::all();
        return view('bandeiras.index', compact('bandeiras'));
    }

    public function create()
    {
        $grupos = GrupoEconomico::all();
        return view('bandeiras.create', compact('grupos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'grupo_economico_id' => 'required|exists:grupos_economicos,id',
        ]);

        $bandeira = new Bandeira();
        $bandeira->nome = $request->nome;
        $bandeira->grupo_economico_id = $request->grupo_economico_id;
        $bandeira->save();

        return redirect()->route('bandeiras.index')->with('success', 'Bandeira criada com sucesso!');
    }

    public function edit($id)
    {
        $bandeira = Bandeira::findOrFail($id);
        $grupos = GrupoEconomico::all();
        return view('bandeiras.edit', compact('bandeira', 'grupos'));
    }

    public function update(Request $request, $id)
    {
        $bandeira = Bandeira::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'grupo_economico_id' => 'required|exists:grupo_economicos,id',
        ]);

        // Atualiza os dados da bandeira
        $bandeira->nome = $request->nome;
        $bandeira->grupo_economico_id = $request->grupo_economico_id;
        $bandeira->updated_at = now(); // Atualiza a data de atualização

        $bandeira->save();

        return redirect()->to('/api/bandeiras')->with('success', 'Bandeira editada com sucesso!');
    }

    public function destroy($id)
    {
        $bandeira = Bandeira::findOrFail($id);
        $bandeira->delete();

        return redirect()->route('bandeiras.index')->with('success', 'Bandeira deletada com sucesso!');
    }
}
