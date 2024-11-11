<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unidades</title>
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
        <h1>Lista de Unidades</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome Fantasia</th>
                    <th>Razão Social</th>
                    <th>CNPJ</th>
                    <th>Bandeira</th>
                    <th>Data de Criação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($unidades as $unidade)
                    <tr>
                        <td>{{ $unidade->id }}</td>
                        <td>{{ $unidade->nome_fantasia }}</td>
                        <td>{{ $unidade->razao_social }}</td>
                        <td>{{ $unidade->cnpj }}</td>
                        <td>{{ $unidade->bandeira->nome }}</td>
                        <td>{{ $unidade->created_at }}</td>
                        <td>
                            <form action="http://localhost:8000/api/unidades/{{ $unidade->id }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta unidade?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Excluir</button>
                            </form>
                            <a href="http://localhost:8000/api/unidades/{{ $unidade->id }}/edit"><button>Editar</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="http://localhost:8000/api/unidades/create"><button>Criar nova unidade</button>
        </div>
</body>
</body>
</html>
