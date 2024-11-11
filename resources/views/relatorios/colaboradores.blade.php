
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Colaboradores</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Relatório de Colaboradores</h1>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cargo</th>
                <th>Departamento</th>
                <th>Data de Contratação</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($colaboradores as $colaborador)
            <tr>
                <td>{{ $colaborador->nome }}</td>
                <td>{{ $colaborador->cargo }}</td>
                <td>{{ $colaborador->departamento }}</td>
                <td>{{ $colaborador->data_contratacao->format('d/m/Y') }}</td>
                <td>{{ $colaborador->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
