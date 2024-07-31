@extends("layouts.main")

@section("title", "Detalhes da Manutenção")

@section("content")
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3><ion-icon name="construct"></ion-icon> {{$event->title}}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><ion-icon name="calendar"></ion-icon> <strong>Data:</strong> {{ date('d/m/Y', strtotime($event->date)) }}</p>
                    <p><ion-icon name="hammer"></ion-icon> <strong>Tipo:</strong> {{$event->type}}</p>
                    <p><ion-icon name="person"></ion-icon> <strong>Técnico Responsável:</strong> [Nome do Técnico]</p>
                    <p><ion-icon name="build"></ion-icon> <strong>Equipamento:</strong> {{$event->equipamento->nome}}</p>
                </div>
                <div class="col-md-6">
                    <h5><ion-icon name="clipboard"></ion-icon> Trabalho a ser realizado:</h5>
                    <p>{{$event->description}}</p>
                </div>
            </div>
            <div class="mt-3">
                <form action="{{ route('events.finish', $event->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-success">
                        <ion-icon name="checkmark-circle"></ion-icon> Marcar como Finalizado
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection