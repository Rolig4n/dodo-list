<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div>
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
        <h1 class="text-center">Adicionar Tarefa</h1>
        <form method="POST" action="{{route('tarefas.store')}}">
            @csrf
            @method('POST')
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>
            <br>
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" required></textarea>
            <br>
            <label for="data_vencimento">Vencimento:</label>
            <input type="date" id="data_vencimento" name="data_vencimento" required>
            <br>
            <input id="status" name="status" value="Pendente" hidden>
            <br>
            <button class="btn btn-primary mt-3">Adicionar</button>
        </form>
    </div>
</body>
</html>