<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table class="table" id="table-list">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Slug</th>
                <th>Foto</th>
                <th>Website</th>
                <th>Descrição</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($etiquetas as $etiqueta)
            
            <tr>
                <td>{{ room.id }}</td>
                <td>{{ room.name }}</td>
                <td>{{ room.slug }}</td>
                <td>
                    <img src="{{ room.photo }}" width="50"></img>
                </td>
                <td>{{ room.website }}</td>
                <td>{{ room.description }}</td>

                <td>
                    <a href="">
                        <button type="button" class="btn btn-sm btn-light-secondary">
                            Imprimir
                        </button>
                        <input type="text" class="roomId" required roomId={{room.id}} hidden>
                    </a>
                    <a href="">
                        <button type="button" class="btn btn-sm btn-warning">
                            Editar
                        </button>
                    </a>
                    <a href="">
                        <button type="button" class="btn btn-sm btn-warning">
                            Editar
                        </button>
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Nenhuma sala cadastrada.</td>
            </tr>

            @endforelse


        </tbody>
    </table>
</body>

</html>