@extends('templates.layout')
@section('title', 'Lista Corsi')

@section('content')
@if(Auth::user()->isAdmin)
        <a type="button" class="btn btn-secondary text-dark d-block my-3 w-75 mx-auto" href="/corsi/create">
             <i class="bi bi-plus"></i> Nuovo Corso </a>
@endif

@if($corsi)
<div class="list-group w-75 mx-auto">
    @foreach($corsi as $key => $corso)
    <x-corso-componente :corso="$corso" />

    @endforeach
</div>
@endif

@endsection
