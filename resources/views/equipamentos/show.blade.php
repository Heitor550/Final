@extends('layouts.main')

@section('title', 'Detalhes da Ferramenta')

@section('content')
<div class="col-md-6 offset-md-3">
    <h1>{{ $equipamento->nome }}</h1>
    
    @if($equipamento->imagem)
        <img src="{{ asset('storage/'.$equipamento->imagem) }}" alt="{{ $equipamento->nome }}" class="img-fluid mb-3">
    @endif
    
    <p><strong>Tipo:</strong> {{ $equipamento->tipo }}</p>
    <p><strong>Fabricante:</strong> {{ $equipamento->fabricante }}</p>
    <p><strong>Data de Aquisição:</strong> {{ date('d/m/Y', strtotime($equipamento->data_aquisicao)) }}</p>
    
    <a href="{{ route('equipamentos.edit', $equipamento->id) }}" class="btn btn-warning">Editar</a>
    <form action="{{ route('equipamentos.destroy', $equipamento->id) }}" method="POST" style="display:inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta ferramenta?')">Excluir</button>
    </form>
    <a href="{{ route('equipamentos.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection