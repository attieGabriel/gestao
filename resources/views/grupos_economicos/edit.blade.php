<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Grupos Economicos</title>
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
    <title>Editar Grupo Econômico</title>
</head>
<body>
    <h1>Editar Grupo Econômico</h1>

    <form action="{{ route('grupos_economicos.update', $grupo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nome">Nome do Grupo:</label>
        <input type="text" id="nome" name="nome" value="{{ $grupo->nome }}" required>
        <br>

        <button type="submit">Salvar</button>
    </form>

    <br>
    <a href="http://localhost:8000/api/grupos_economicos"><button>Voltar à lista</button></a>
</div>
</body>
</body>
</html>
