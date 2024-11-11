<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Colaboradores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            padding: 10px;
            height: 100vh;
            position: fixed;
            color: white;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            display: block;
            padding: 10px;
            margin: 5px 0;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        .content {
            margin-left: 260px;
            padding: 20px;
            flex-grow: 1;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        button {
            background-color: #2980b9;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #3498db;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2><a href="http://localhost:8000/">Menu</a></h2>
        <a href="http://localhost:8000/api/unidades">Unidades</a>
        <a href="http://localhost:8000/api/bandeiras">Bandeiras</a>
        <a href="http://localhost:8000/api/grupos_economicos">Grupos Econômicos</a>
        <a href="http://localhost:8000/api/colaboradores">Colaboradores</a>
    </div>

    <div class="content">
    <title>Editar Colaborador</title>
</head>
<body>
    <h1>Editar Colaborador</h1>

    <form action="{{ route('colaboradores.update', $colaborador->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="{{ $colaborador->nome }}" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $colaborador->email }}" required>
        <br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" value="{{ $colaborador->cpf }}" required>
        <br>

        <label for="unidade">Unidade:</label>
        <select id="unidade" name="unidade_id" required>
            @foreach($unidades as $unidade)
                <option value="{{ $unidade->id }}" {{ $unidade->id == $colaborador->unidade_id ? 'selected' : '' }}>
                    {{ $unidade->nome_fantasia }}
                </option>
            @endforeach
        </select>
        <br>

        <button type="submit">Salvar</button>
    </form>

    <br>
    <a href="http://localhost:8000/api/colaboradores"><button>Voltar à lista</button></a>
</div>
</body>
</body>
</html>
