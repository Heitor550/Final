@extends("layouts.main")

@section("title", "Agendar Manutenção")

@section("content")

<div class="container">
    <div id="event-create-container">
        <h1>Agendamento de Manutenções</h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="equipamento_id">Equipamento:</label>
                <select name="equipamento_id" id="equipamento_id" class="form-control" required>
    <option value="">Selecione um equipamento</option>
    @foreach($equipamentos as $equipamento)
        <option value="{{ $equipamento->id }}">{{ $equipamento->nome }}</option>
    @endforeach
</select>
            </div>
            <div class="form-group">
                <label for="title">Serviço:</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Serviço a ser prestado..." required>
            </div>
            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="Problema relatado (Opcional)"></textarea>
            </div>
            <div class="form-group">
    <label for="type">Tipo de Manutenção:</label>
    <select name="type" id="type" class="form-control" required>
        <option value="Corretiva">Corretiva</option>
        <option value="Preventiva">Preventiva</option>
    </select>
</div>
            <div class="form-group">
                <label for="date">Data da Manutenção:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <button type="submit" class="btn btn-primary">Agendar!</button>
        </form>
    </div>
</div>

@endsection