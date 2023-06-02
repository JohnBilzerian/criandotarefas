<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $data = Tarefa::orderBy('tarefa_prioridade', 'asc')->paginate(10);
        return view('tarefas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        return view('tarefas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $request->validate([
            'tarefa_titulo'     => 'required',
            'tarefa_descricao'  => 'required',
            'tarefa_status'     => 'required',
            'tarefa_data'       => 'required',
            'tarefa_prioridade' => 'required',
        ]);

        $tarefa                    = new Tarefa;
        $tarefa->tarefa_titulo     = $request->tarefa_titulo;
        $tarefa->tarefa_descricao  = $request->tarefa_descricao;
        $tarefa->tarefa_status     = $request->tarefa_status;
        $tarefa->tarefa_data       = Carbon::parse($request->tarefa_data); // Converter para formato Carbon
        $tarefa->tarefa_prioridade = $request->tarefa_prioridade;
        $tarefa->save();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)

    {

        return view('tarefas.show', compact('tarefa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */

    public function edit(Tarefa $tarefa)

    {
        return view('tarefas.edit', compact('tarefa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)

    {
        $request->validate([
            'tarefa_titulo'     => 'required',
            'tarefa_descricao'  => 'required',
            'tarefa_status'     => 'required',
            'tarefa_data'       => 'required',
            'tarefa_prioridade' => 'required',
        ]);

        $tarefa                    = new Tarefa;
        $tarefa->tarefa_titulo     = $request->tarefa_titulo;
        $tarefa->tarefa_descricao  = $request->tarefa_descricao;
        $tarefa->tarefa_status     = $request->tarefa_status;
        $tarefa->tarefa_data       = Carbon::parse($request->tarefa_data); // Converter para formato Carbon
        $tarefa->tarefa_prioridade = $request->tarefa_prioridade;
        $tarefa->save();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa Added successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)

    {
        $tarefa->delete();
        return redirect()->route('tarefas.index')->with('success', 'Tarefa Data deleted successfully');
    }

    public function __construct()

    {
        $this->middleware('auth');
    }
}
