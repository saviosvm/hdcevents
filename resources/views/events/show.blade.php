@extends('layouts.main')

@section('title', $event->title)

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $event->title }}</h1>
                <p class="event-cidade">
                    <ion-icon name="location-outline"></ion-icon>{{ $event->cidade }}
                </p>
                <p class="event-participants">
                    <ion-icon name="people-outline"></ion-icon>{{count($event->users)}} Particpantes <!--Conta quantos usuários existem no evento-->
                </p>
                <p class="event-dono">
                    <ion-icon name="star-outline"></ion-icon>{{$eventDono['name']}}
                </p>

                <form action="{{route('event.join', ['id' => $event->id])}}" method="POST">
                    @csrf
                    <a href="{{route('event.join', ['id' => $event->id])}}"
                       class="btn btn-primary" 
                       id="event-submit"
                       onclick="event.preventDefault();this.closest('form').submit();" >   <!--faz enviar como se fosse um botão submit -->
                       Confirmar presença
                    </a> 
                    
                </form>

                <h3>O Evento conta com:</h3>
                <ul id="items-list">
                    @foreach ($event->items as $item)
                        <li><ion-icon name="play-outline"></ion-icon> <span>{{ $item }}</span> </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre o Evento:</h3>
                <p class="event-description">{{ $event->description }}</p>
            </div>
        </div>
    </div>

@endsection
