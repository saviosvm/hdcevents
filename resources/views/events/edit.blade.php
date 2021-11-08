@extends('layouts.main')

@section('title', 'Editando:' . $event->title)

@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Editando: {{$event->title}}</h1>
        <form action="{{ route('event.update', ['id' => $event->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="image">Imagem do Evento:</label>
                <input type="file" id="image" name="image"  class="from-control-file">
                <img src="/img/events/{{$event->image}}" alt="{{$event->title}}" class="img-preview">
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$event->title}}" placeholder="Nome do Evento">
            </div>
            <br>
            <div class="form-group">
                <label for="date">Data do Evento:</label>
                <input type="date" class="form-control" id="date" name="date" value="{{$event->date->format('Y-m-d')}}">
            </div>
            <br>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" class="form-control" id="cidade" name="cidade" value="{{$event->cidade}}" placeholder="Nome da Cidade">
            </div>
            <br>
            <div class="form-group">
                <label for="private">O Evento é privado?</label>
                <select name="private" id="private"  class="form-control">
                    <option value="0" {{$event->private == 0 ? "selected  = 'selected' " : ''}}>Não</option>
                    <option value="1" {{$event->private == 1 ? "selected  = 'selected' " : ''}}>Sim</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="description">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?">{{$event->description}}</textarea>
            </div>
            <br>
            <div class="form-group">
                <label for="description">Adicione itens da Infraestrutura:</label>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" class="btn btn-primary" value="Cadeiras"> Cadeiras
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" class="btn btn-primary" value="Palco"> Palco
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" class="btn btn-primary" value="Bebida grátis"> Bebida grátis
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" class="btn btn-primary" value="Open Food"> Open Food
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="items[]" class="btn btn-primary" value="Brindes"> Brindes
                    </div>
            </div>
            <br>
            <input type="submit" class="btn btn-primary" value="Criar Evento">
        </form>
    </div>
@endsection
