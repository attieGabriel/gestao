<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Bandeira</title>
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
        <h1>Editar Bandeira</h1>

        <form action="{{ route('bandeiras.update', $bandeira->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $bandeira->id }}">

            <label for="nome">Nome da Bandeira:</label>
            <input type="text" id="nome" name="nome" value="{{ $bandeira->nome }}" required>
            <br>

            <label for="grupo_economico">Grupo Econômico:</label>
            <select id="grupo_economico" name="grupo_economico_id" required>
                @foreach($grupos as $grupo)
                <option value="{{ $grupo->id }}" {{ $grupo->id == $bandeira->grupo_economico_id ? 'selected' : '' }}>
                    {{ $grupo->nome }}
                </option>
                @endforeach
            </select>
            <br>

            <button type="submit">Salvar</button>
        </form>

        <br>
        <a href="http://localhost:8000/api/bandeiras"><button>Voltar à lista</button></a>
    </div>
</body>
</html>
