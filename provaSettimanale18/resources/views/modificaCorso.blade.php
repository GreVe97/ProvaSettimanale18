@extends('templates.layout')
@section('title', 'Modifica Corso')

@section('content')

<form method="post" action="/corsi/{{$corso->id}}">
@csrf
    @method('PATCH')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nome</label>
    <input type="text" class="form-control" id="" value="{{$corso->nome}}" name="nome" placeholder="Nome Corso">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descrizione</label>
    <textarea class="form-control" placeholder="Descrizione" id="floatingTextarea2" value="{{$corso->descrizione}}" name="descrizione" style="height: 100px">{{$corso->descrizione}}</textarea>
    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Istruttore</label>
    <input type="text" class="form-control" id="" value="{{$corso->istruttore}}" name="istruttore" placeholder="Nome Istruttore">
  </div>

  <button type="submit" class="btn btn-primary text-dark">Conferma</button>
</form>
@endsection