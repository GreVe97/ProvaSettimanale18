@extends('templates.layout')
@section('title', 'Crea Corso')

@section('content')

<form method="post" action="/corsi">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nome</label>
    <input type="text" class="form-control" id=""  name="nome" placeholder="Nome Corso">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descrizione</label>
    <textarea class="form-control" placeholder="Descrizione" id="floatingTextarea2" name="descrizione" style="height: 100px"></textarea>
    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Istruttore</label>
    <input type="text" class="form-control" id=""  name="istruttore" placeholder="Nome Istruttore">
  </div>

  <button type="submit" class="btn btn-primary text-dark">Conferma</button>
</form>
@endsection