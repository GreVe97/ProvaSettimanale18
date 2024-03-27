@extends('templates.layout')
@section('title', 'Info Attività')

@section('content')
<div>
       <div class="d-flex align-items-center">
    <h1 class="mb-1 d-inline-block h2">
        <span class="fw-bold">Nome attivita:</span> 
        {{$attivita->nome}}
    </h1>
</div>
   </div>
   
    <div class="container">
        <div class="d-flex">
            <div>
             <p class="mt-3">
            <span class="fw-semibold">Descrizione:</span> {{$attivita->descrizione}}
        </p>
        <p>
             <span class="fw-semibold">Giorno:</span> {{$attivita->giorno}} <span class="fw-semibold">Ora:</span>{{$attivita->ora}} <span class="fw-semibold">Sala:</span> {{$attivita->sala}} 
        </p>
        </div>
        <div>
        <x-bottoni-componente :oggetto="$attivita" :tipo="'attivita'"/>
        </div>

        </div>
        <div>
            <h4 class="h4 my-2">Corso:</h4>
            <div class="list-group w-75 mx-5">               
                <x-corso-componente :corso="$attivita->corsi" />
            </div>
        </div>
    </div>
@endsection