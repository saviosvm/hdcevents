@extends('layouts.main')

@section('title', 'Produto')
    
@section('content')
<p>exibindo produto id: {{($id == null) ? 'Sem id' : $id}}</p>
@endsection       
