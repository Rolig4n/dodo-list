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
        return view('tarefas.index');
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
            //'status' => [Rule::enum(StatusTarefa::class)->only(StatusTarefa::PENDENTE)] ainda nao entendi como validar enum
        ]);

        $novaTarefa = Tarefa::create($data);
        
        return redirect(route('tarefas.index'))
            ->with('success', 'Tarefa criada com sucesso!');
    }

    public function show($id)
    {
        return view('tarefas.show', compact('id'));
    }

    public function edit($id)
    {
        return view('tarefas.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Lógica para atualizar a tarefa no banco de dados
        return redirect()->route('tarefas.index');
    }

    public function destroy($id)
    {
        // Lógica para excluir a tarefa do banco de dados
        return redirect()->route('tarefas.index');
    }
}
