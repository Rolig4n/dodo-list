<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Lista de Tarefas</h1>
        <div>
            @if (session()->has('success'))
                <div class="alert alert-success">
                {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <button class="btn btn-primary mt-3">
            <a class="link-body-emphasis link-offset-2 link-underline-opacity-0" href="{{ route('tarefas.create') }}">Adicionar</a>
        </button>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tarefa</th>
                    <th>Descrição</th>
                    <th>Vencimento</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tarefas as $tarefa)
                <tr>
                    <td>{{ $tarefa->id }}</td>
                    <td>{{ $tarefa->titulo }}</td>
                    <td>{{ $tarefa->descricao }}</td>
                    <td>{{ $tarefa->data_vencimento }}</td>
                    <td>{{ $tarefa->status }}</td>
                    <td>
                        <button class="btn btn-success">
                            <a class="link-body-emphasis link-offset-2 link-underline-opacity-0" href="{{ route('tarefas.edit', ['tarefa' => $tarefa]) }}">Editar</a>
                        </button>
                        <form method="POST" action="{{ route('tarefas.destroy', ['tarefa' => $tarefa]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">
                                <a class="link-body-emphasis link-offset-2 link-underline-opacity-0">Excluir</a>
                            </butt>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html></div>