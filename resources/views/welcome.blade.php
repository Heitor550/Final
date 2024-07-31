    @extends("layouts.main")

    @section("title", "Bem-vindo(a)!")

    @section("content")

    <div class="container mt-4">
        <div class="row mb-4">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center"><ion-icon name="search"></ion-icon> Realize uma busca</h2>
                <form action="/" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Buscar manutenções...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                @if($search)
                <h3>Buscando por: {{$search}}</h3>
                @else
                <h3><ion-icon name="calendar"></ion-icon> Próximas Manutenções</h3>
                <p class="text-muted">Manutenções a serem entregues nos próximos dias</p>
                @endif
                <ul class="list-group">
                    @foreach($events as $event)
                        <li class="list-group-item d-flex justify-content-between align-items-center {{ $event->finished ? 'text-muted text-decoration-line-through finished-item' : ($event->type == 'Preventiva' ? 'pending-preventive' : 'pending-other') }}">
                            <span>
                                @if($event->finished)
                                    <ion-icon name="checkmark-circle"></ion-icon>
                                @else
                                    <ion-icon name="{{ $event->type == 'Preventiva' ? 'shield-outline' : 'alert-circle-outline' }}"></ion-icon>
                                @endif
                                {{ date('d/m/Y', strtotime($event->date)) }} - {{$event->title}}
                            </span>
                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-sm btn-info">
                                <ion-icon name="eye"></ion-icon> Inspecionar
                            </a>
                        </li>
                    @endforeach
                </ul>
                @if(count($events) == 0)
                    @if($search)
                    <p>Não foi possível encontrar nenhum evento com {{$search}}! <a href="/">Ver todos...</a></p>
                    @else
                    <p>Não há manutenções disponíveis!</p>
                    @endif
                @endif
            </div>
        </div>
    </div>
    @endsection