@props(['corso'])

<div class="list-group-item p-3" aria-current="true">
        <div class="d-flex w-100 ">
            <div>
                <h5 class="mb-1">
                    <span class="fw-bold manina"> Nome Corso:</span> 
                    {{$corso->nome}}
                </h5> 
                <small>
                    <span class="fw-semibold ">Istruttore:</span> <span class="text-primary">{{$corso->istruttore}}</span>
                </small>
                <p class="my-1" >
                    <span class="fw-semibold ">Descrizione:</span> <span class="">{{$corso->descrizione}}</span>
</p>
            </div>
            
            <div class="d-flex flex-column ms-auto h-100 text-end">
             <x-bottoni-componente :oggetto="$corso" :tipo="'corsi'"/>
            <span class="text-success mb-auto ">                     
            </span>               
            </div>
        </div>
    </div>