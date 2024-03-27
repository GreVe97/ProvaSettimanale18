@extends('templates.layout')
@section('title', 'Modifica Attività')

@section('content')

<form method="post" action="/attivita/{{$attivita->id}}">
    @csrf
    @method('PATCH')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nome</label>
    <input type="text" class="form-control" id=""  name="nome" value="{{$attivita->nome}}" placeholder="Nome Attivita">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descrizione</label>
    <textarea class="form-control" value="{{$attivita->descrizione}}" id="floatingTextarea2"  placeholder="Descrizione Attivita" name="descrizione" style="height: 100px">{{$attivita->descrizione}}</textarea>
  </div>

  <div class="mb-3">
  <label for="ora">Seleziona il giorno:</label>
    <select name="giorno" value="{{$attivita->giorno}}" class="form-select" id="floatingSelect" aria-label="Floating label select example">
            <option value="Lunedi">Lunedì</option>
            <option value="Martedi">Martedì</option>
            <option value="Mercoledi">Mercoledì</option>
            <option value="Giovedi">Giovedì</option>
            <option value="Venerdi">Venerdì</option>
    </select>
  </div>  
  <div class="mb-3">
        <label for="ora">Seleziona un'ora:</label>
        <input class="form-control" value="{{$attivita->ora}}" type="time" id="ora" name="ora" min="08:00" max="20:00" step="1800">
  </div>
  <div class="mb-3">
        <label for="numero">Scegli la sala:</label>
        <input class="form-control" value="{{$attivita->sala}}" type="number" id="numero" name="sala" min="1" max="9">
  </div>

    <input type="hidden" name="progetto_id" value="{{$attivita->corso_id}}">

  <button type="submit" class="btn btn-primary text-dark">Conferma</button>
</form>

@endsection
