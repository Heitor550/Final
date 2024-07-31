@extends('layouts.main')

@section('title', 'Gerenciar Ferramentas')

@section('content')
<div class="col-md-10 offset-md-1">
    <h1>Ferramentas</h1>
    <a href="{{ route('equipamentos.create') }}" class="btn btn-primary mb-3">Adicionar Nova Ferramenta</a>
    
    @if(count($equipamentos) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Fabricante</th>
                    <th>Data de Aquisição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equipamentos as $equipamento)
                <tr>
                    <td>{{ $equipamento->nome }}</td>
                    <td>{{ $equipamento->tipo }}</td>
                    <td>{{ $equipamento->fabricante }}</td>
                    <td>{{ date('d/m/Y', strtotime($equipamento->data_aquisicao)) }}</td>
                    <td>
                        <a href="{{ route('equipamentos.show', $equipamento->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('equipamentos.edit', $equipamento->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('equipamentos.destroy', $equipamento->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta ferramenta?')">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhuma ferramenta cadastrada.</p>
    @endif
</div>
@endsection