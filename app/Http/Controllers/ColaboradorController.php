<?php

// app/Http/Controllers/ColaboradorController.php
namespace App\Http\Controllers;

use App\Models\Colaborador;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ColaboradorController extends Controller
{
    public function index()
    {
        $colaboradores = Colaborador::all();
        return view('colaboradores.index', compact('colaboradores'));
    }

    public function create()
    {
        $unidades = Unidade::all();
        return view('colaboradores.create', compact('unidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:colaboradores,email',
            'cpf' => 'required|string|size:11|unique:colaboradores,cpf',
            'unidade_id' => 'required|exists:unidades,id',
        ]);

        $colaborador = new Colaborador();
        $colaborador->nome = $request->nome;
        $colaborador->email = $request->email;
        $colaborador->cpf = $request->cpf;
        $colaborador->unidade_id = $request->unidade_id;
        $colaborador->save();

        return redirect()->to('/api/colaboradores')->with('success', 'Colaborador criado com sucesso!');
    }

    public function edit($id)
    {
        $colaborador = Colaborador::findOrFail($id);
        $unidades = Unidade::all(); // Obtém todas as unidades

        return view('colaboradores.edit', compact('colaborador', 'unidades'));
    }

    public function update(Request $request, $id)
    {
        $colaborador = Colaborador::findOrFail($id);

        // Validação dos dados recebidos
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cpf' => 'required|string|max:14',
            'unidade_id' => 'required|exists:unidades,id',
        ]);

        // Atualiza os dados do colaborador
        $colaborador->update($request->all());

        return redirect()->to('/api/colaboradores')->with('success', 'Colaborador editado com sucesso!');
    }

    public function destroy($id)
    {
        $colaborador = Colaborador::findOrFail($id);
        $colaborador->delete();

        return redirect()->route('colaboradores.index')->with('success', 'Colaborador deletado com sucesso!');
    }

    public function exportarHTML()
    {
    // Obtendo todos os colaboradores
    $colaboradores = Colaborador::all();

    // Criando o conteúdo HTML
    $html = '<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Colaboradores</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                padding: 10px;
                border: 1px solid #ddd;
                text-align: left;
            }
            th {
                background-color: #2980b9;
                color: white;
            }
        </style>
    </head>
    <body>
        <h1>Lista de Colaboradores</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Unidade</th>
                    <th>Data de Criação</th>
                </tr>
            </thead>
            <tbody>';

    // Adicionando dados dos colaboradores à tabela
    foreach ($colaboradores as $colaborador) {
        $html .= '<tr>
                    <td>' . $colaborador->id . '</td>
                    <td>' . $colaborador->nome . '</td>
                    <td>' . $colaborador->email . '</td>
                    <td>' . $colaborador->cpf . '</td>
                    <td>' . $colaborador->unidade->nome_fantasia . '</td>
                    <td>' . $colaborador->created_at . '</td>
                  </tr>';
    }

    $html .= '</tbody>
        </table>
    </body>
    </html>';

    // Retornando a resposta com o arquivo HTML
    return response($html, 200)
        ->header('Content-Type', 'text/html')
        ->header('Content-Disposition', 'attachment; filename="colaboradores.html"');
    }
}
