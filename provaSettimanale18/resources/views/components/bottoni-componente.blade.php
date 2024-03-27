@props(['oggetto',"tipo"])


<div class="">  
@if($tipo!="prenotazioni")
<a type="button" 
        href="/{{$tipo}}/{{$oggetto->id}}" 
        class="btn btn-sm btn-outline-info"
        title="Vedi in dettaglio">
        Dettaglio <i class="bi bi-info-circle"></i>
    </a>  
@endif

    @if(Auth::getUser()->isAdmin) 
        @if($tipo=="prenotazioni")
            <form method="post" action="/prenotazioni/{{$oggetto->id}}">
                @csrf
                @method('PATCH') 
                @if($oggetto->stato!="accettata")
                    <button type="submit" name="stato" value="accettata" class="btn btn-outline-success">Accetta <i class="bi bi-check"></i></button>
                @endif
                @if($oggetto->stato!="rifiutata")
                    <button type="submit" name="stato" value="rifiutata" class="btn btn-outline-danger">Rifiuta <i class="bi bi-x"></i></button>
                @endif
                @if($oggetto->stato!="in sospeso")
                    <button type="submit" name="stato" value="in sospeso" class="btn btn-outline-warning">Sospendi <i class="bi bi-stopwatch"></i></button>
                @endif
            </form>

        @else
        
        <a href="/{{$tipo}}/{{$oggetto->id}}/edit" type="button" class="btn btn-sm btn-outline-warning">
            Modifica <i class="bi bi-pencil-square"></i>
        </a> 
        @endif 
        @if($tipo=="corsi")           
            <a type="button" class="btn btn-sm btn-outline-secondary"
                href="/attivita/create?corso_id={{$oggetto->id}}">
                Aggiungi Attività<i class="bi bi-plus-circle"></i>
            </a>  
        @endif
        <form class="d-inline" method="post" action="/{{$tipo}}/{{$oggetto->id}}"> 
            @csrf 
            @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">
                    Elimina <i class="bi bi-trash3-fill"></i>
                </button> 
        </form>

    @else
    @if($tipo=="attivita")
        @if($oggetto->prenotazioni->isEmpty())
        <form method="post" action="/prenotazioni">
                 @csrf
            <button type="submit" class="btn btn-sm btn-outline-primary">
               Prenotati <i class="bi bi-calendar-week"></i>
            </button> 
            <input type="hidden" name="attivita_id" value="{{$oggetto->id}}">
            </form>
        @else            
            <form class="d-inline" method="post" action="/prenotazioni/{{$oggetto->prenotazioni[0]->id}}"> 
                @csrf 
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-warning">Annulla Prenotazione <i class="bi bi-calendar-week"></i>
                </button> 
            </form>
        @endif
    @endif
    @if($tipo=="prenotazioni")
    <form class="d-inline" method="post" action="/{{$tipo}}/{{$oggetto->id}}"> 
            @csrf 
            @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">
                    Elimina <i class="bi bi-trash3-fill"></i>
                </button> 
    </form>
    @endif
    @endif 
                  
    
</div>