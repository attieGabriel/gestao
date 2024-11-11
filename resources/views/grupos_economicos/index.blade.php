<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupos Economicos</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #2980b9;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
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

        .create-button {
            margin-top: 20px;
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
    <title>Grupo Econômico - Index</title>
</head>
<body>
    <h1>Lista de Grupos Econômicos</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Criação</th>
                <th>Data de Atualização</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grupos as $grupo)
                <tr>
                    <td>{{ $grupo->id }}</td>
                    <td>{{ $grupo->nome }}</td>
                    <td>{{ $grupo->created_at }}</td>
                    <td>{{ $grupo->updated_at }}</td>
                    <td>
                        <form action="http://localhost:8000/api/grupos_economicos/{{ $grupo->id }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este grupo?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                        <a href="http://localhost:8000/api/grupos_economicos/{{ $grupo->id }}/edit"><button>Editar</button></a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="http://localhost:8000/api/grupos_economicos/create"><button>Criar novo grupo</button>
    </div>
</body>
</body>
</html>
