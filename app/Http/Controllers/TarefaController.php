<?php

namespace App\Http\Controllers;

use App\Enum\StatusTarefa;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::all();
        return view('tarefas.index', ['tarefas' => $tarefas]);
    }

    public function create()
    {
        return view('tarefas.create');
    }

    public function store(Request $request)
    {
        // Lógica para armazenar a tarefa no banco de dados
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required',
            'data_vencimento' => 'required|date',
            'status' => [Rule::enum(StatusTarefa::class)]// ainda nao entendi como validar enum
        ]);

        $novaTarefa = Tarefa::create($data);
        
        return redirect(route('tarefas.index'))
            ->with('success', 'Tarefa criada com sucesso!');
    }

    public function edit(Tarefa $tarefa)
    {
        return view('tarefas.edit', ['tarefa'=> $tarefa]);
    }

    public function update(Tarefa $tarefa, Request $request)
    {
        // Lógica para atualizar a tarefa no banco de dados
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required',
            'data_vencimento' => 'required|date',
            'status' => [Rule::enum(StatusTarefa::class)],// ainda nao entendi como validar enum
        ]);

        $tarefa->update($data);

        return redirect(route('tarefas.index'))
            ->with('success', 'Tarefa alterada com sucesso!');
    }

    public function destroy(Tarefa $tarefa)
    {
        // Lógica para excluir a tarefa do banco de dados
        $tarefa->delete();
        return redirect(route('tarefas.index'))
            ->with('success', 'Tarefa excluida com sucesso!');
    }

    public function show($id)
    {
        return view('tarefas.show', compact('id'));
    }
}
