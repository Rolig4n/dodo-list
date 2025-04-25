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
        <h1 class="text-center">Editar Tarefa</h1>
        <form method="PUT" action="{{route('tarefas.update', ['tarefa' => $tarefa])}}">
            @csrf
            @method('PUT')
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="{{ $tarefa->titulo }}" required>
            <br>
            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" value="{{ $tarefa->descricao }}" required>
            <br>
            <label for="data_vencimento">Vencimento:</label>
            <input type="date" id="data_vencimento" value="{{ $tarefa->data_vencimento }}" name="data_vencimento" required>
            <br>
            <label for="status">Status:</label>
            <select id="status" name="status" placeholder="Escolha" value="{{ $tarefa->status }}" >
                <option value="" disabled>Escolha</option>    
                @foreach (\App\Enum\StatusTarefa::cases() as $status)
                <option value="{{ $status->value }}">{{ $status->name }}</option>
                @endforeach
            </select>
            <br>
            <button class="btn btn-primary mt-3">Editar</button>
        </form>
    </div>
</body>
</html>