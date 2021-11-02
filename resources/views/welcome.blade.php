@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')
    <div class="col-md-12" id="search-container">
        <h1>Busque um Evento</h1>
        <form action="{{ route('event.index') }}" method="GET">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        @if ($search)
            <h2>Buscando por: {{ $search }}</h2>
        @else
            <h2>Próximos Eventos</h2>
            <p class="subtitle">Veja os eventos dos próximos dias</p>
        @endif

        <div id="cards-container" class="row">
            @foreach ($events as $event)
                <div class="card col-md-3">
                    <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">
                    <div class="card-body">
                        <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-participants">x Participantes</p>
                        <a href="{{ route('event.show', ['id' => $event->id]) }}" class="btn btn-primary">Saber mais</a>

                    </div>
                </div>

            @endforeach
            @if (count($events) == 0 && $search)
                <p>não foi possível encontrar nenhum evento correspondente a {{$search}}! <a href="{{route('event.index')}}">Ver Todos</a></p>
                @elseif(count($events) == 0)
                <p>Não há eventos disponívei</p>
            @endif
        </div>
    </div>
@endsection
