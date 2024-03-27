@extends('templates.layout')
@section('title', 'Lista Prenotazioni')
@section('content')
@if($prenotazioni)

<table class="table">
  <thead>
    <tr>
      @if(Auth::getUser()->isAdmin)
      <th scope="col">Nome utente</th>
      <th scope="col">Id utente</th>
      @endif      
      <th scope="col">Nome Attività</th>
      <th scope="col">Corso</th>
      <th scope="col">Giorno</th>
      <th scope="col">Ora</th>
      <th scope="col">Sala</th>
      <th scope="col">Stato</th>
      <th scope="col">Azioni</th>
    </tr>
  </thead>
  <tbody>
  @foreach($prenotazioni as $prenotazione) 
    <tr class="{{$prenotazione->stato=="accettata" ? 'table-success':($prenotazione->stato=="in sospeso"? 'table-warning':'table-danger')}}">          
    @if(Auth::getUser()->isAdmin)
      <th scope="col">{{ $prenotazione->user->name}}</th>
      <th scope="col">{{ $prenotazione->user_id}}</th>
      @endif
      <td>{{ $prenotazione->attivita->nome}}</td>
      <td>{{ $prenotazione->attivita->corsi->nome}}</td>
      <td>{{ $prenotazione->attivita->giorno}}</td>
      <td>{{ $prenotazione->attivita->ora}}</td>
      <td>{{ $prenotazione->attivita->sala}}</td>
      <td>{{ $prenotazione->stato}}</td>
      <td> <x-bottoni-componente :oggetto="$prenotazione" :tipo="'prenotazioni'"/></td>
    </tr>    
    @endforeach
  </tbody>
</table>
@endif
@endsection
