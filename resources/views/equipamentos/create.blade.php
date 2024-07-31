@extends('layouts.main')

@section('title', 'Adicionar Ferramenta')

@section('content')
<div class="col-md-6 offset-md-3">
    <h1>Adicionar Nova Ferramenta</h1>
    
    <form action="{{ route('equipamentos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="tipo">Tipo:</label>
            <input type="text" class="form-control" id="tipo" name="tipo" required>
        </div>
        <div class="form-group">
            <label for="fabricante">Fabricante:</label>
            <input type="text" class="form-control" id="fabricante" name="fabricante" required>
        </div>
        <div class="form-group">
            <label for="data_aquisicao">Data de Aquisição:</label>
            <input type="date" class="form-control" id="data_aquisicao" name="data_aquisicao" required>
        </div>
        <div class="form-group">
            <label for="imagem">Imagem:</label>
            <input type="file" class="form-control-file" id="imagem" name="imagem">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Ferramenta</button>
    </form>
</div>
@endsection