@extends('layouts.main')

@section('title', 'Editar Ferramenta')

@section('content')
<div class="col-md-6 offset-md-3">
    <h1>Editar Ferramenta</h1>
    
    <form action="{{ route('equipamentos.update', $equipamento->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $equipamento->nome }}" required>
        </div>
        <div class="form-group">
            <label for="tipo">Tipo:</label>
            <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $equipamento->tipo }}" required>
        </div>
        <div class="form-group">
            <label for="fabricante">Fabricante:</label>
            <input type="text" class="form-control" id="fabricante" name="fabricante" value="{{ $equipamento->fabricante }}" required>
        </div>
        <div class="form-group">
            <label for="data_aquisicao">Data de Aquisição:</label>
            <input type="date" class="form-control" id="data_aquisicao" name="data_aquisicao" value="{{ $equipamento->data_aquisicao }}" required>
        </div>
        <div class="form-group">
            <label for="imagem">Imagem:</label>
            <input type="file" class="form-control-file" id="imagem" name="imagem">
            @if($equipamento->imagem)
                <img src="{{ asset('storage/'.$equipamento->imagem) }}" alt="{{ $equipamento->nome }}" class="img-thumbnail mt-2" style="max-width: 200px;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Ferramenta</button>
    </form>
</div>
@endsection