<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;

class EquipamentoController extends Controller
{
    public function index()
    {
        $equipamentos = Equipamento::all();
        return view('equipamentos.index', compact('equipamentos'));
    }

    public function create()
    {
        return view('equipamentos.create');
    }

    public function show(Equipamento $equipamento)
    {
        return view('equipamentos.show', compact('equipamento'));
    }

    public function edit(Equipamento $equipamento)
    {
        return view('equipamentos.edit', compact('equipamento'));
    }

    public function destroy(Equipamento $equipamento)
    {
        $equipamento->delete();
        return redirect()->route('equipamentos.index')->with('success', 'Equipamento excluído com sucesso.');
    }

    public function update(Request $request, Equipamento $equipamento)
    {
        $request->validate([
            'nome' => 'required',
            'tipo' => 'required',
            'fabricante' => 'required',
            'data_aquisicao' => 'required|date',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $equipamento->fill($request->except('imagem'));

        if ($request->hasFile('imagem')) {
            // Lógica para upload da nova imagem
            $imagemPath = $request->file('imagem')->store('equipamentos', 'public');
            $equipamento->imagem = $imagemPath;
        }

        $equipamento->save();

        return redirect()->route('equipamentos.index')->with('success', 'Equipamento atualizado com sucesso.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'tipo' => 'required',
            'fabricante' => 'required',
            'data_aquisicao' => 'required|date',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $equipamento = new Equipamento($request->all());

        if ($request->hasFile('imagem')) {
            $imagemPath = $request->file('imagem')->store('equipamentos', 'public');
            $equipamento->imagem = $imagemPath;
        }

        $equipamento->save();

        return redirect()->route('equipamentos.index')->with('success', 'Equipamento criado com sucesso.');
    }

    // Implementar outros métodos (show, edit, update, destroy) conforme necessário
}