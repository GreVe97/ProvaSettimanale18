@extends('templates.layout')
@section('title', 'Info Corso')

@section('content')
<div>
       <div class="d-flex align-items-center">
    <h1 class="mb-1 d-inline-block h2">
        <span class="fw-bold">Nome Corso:</span> 
        {{$corso->nome}}
    </h1>
</div>

       
    
    </div>
   
    <div class="container">
        <div class="d-flex">
            <div>
            <p class="mt-2 h5">
                <span class="fw-bold">Nome cliente:</span> {{$corso->nomeCliente}}
            </p>
            <p class="mt-2">
                <span class="fw-semibold">Istruttore:</span> <span class="text-primary">{{$corso->istruttore}}</span>
            </p>
             <p class="mt-3">
            <span class="fw-semibold">Descrizione:</span> {{$corso->descrizione}}
        </p>

        </div>
        <div>
        <x-bottoni-componente :oggetto="$corso" :tipo="'corsi'"/>
        </div>

        </div>
        

       
        <div>
            <h4 class="h4 my-2">Attività:</h4>
            <div class="list-group w-75 mx-5">
                @foreach($corso->attivita as $attivita)
                <div class="bg-opacity-25 list-group-item p-3 border" aria-current="true">
                        <div class="d-flex w-100">
                            <div>
                                <h5 class="mb-1">
                                    <span class="fw-bold manina">Nome Attività:</span> {{$attivita->nome}}
                                </h5> 
                                <p class="mb-1">
                                    <span class="fw-semibold text-truncate">Descrizione:</span> {{$attivita->descrizione}}
                                </p>
                                <p>
                                    <span class="fw-semibold">Giorno:</span> {{$attivita->giorno}} <span class="fw-semibold">Ora:</span>{{$attivita->ora}} 
                                    <span class="fw-semibold">Sala:</span> {{$attivita->sala}} 
                                </p>
                            </div>  
                            <div class="align-self-end ms-auto"> 
                            <x-bottoni-componente :oggetto="$attivita" :tipo="'attivita'"/>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection