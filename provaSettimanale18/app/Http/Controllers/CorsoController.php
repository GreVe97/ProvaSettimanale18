<?php

namespace App\Http\Controllers;

use App\Models\Corso;
use App\Http\Requests\StoreCorsoRequest;
use App\Http\Requests\UpdateCorsoRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class CorsoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('listaCorsi',['corsi'=>Corso::with('attivita')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('creaCorso');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCorsoRequest $request)
    {
        $nuovoCorso = $request->only(['nome','descrizione','istruttore']);
       Corso::create($nuovoCorso);
       return redirect()->action([CorsoController::class, 'index']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Corso $corsi)
    {

      /* return $corsi->load(['attivita.prenotazioni' => function ($query) {
            $query->where('user_id', Auth::id());
        }]); */
 
       return view('infoCorso',['corso'=>$corsi->load(['attivita.prenotazioni' => function ($query) {
            $query->where('user_id', Auth::id());
        }])]);
        

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Corso $corsi)
    {
        return view('modificaCorso',['corso'=>$corsi]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCorsoRequest $request, Corso $corsi)
    {
        $corsi->nome = $request->nome ;
        $corsi->istruttore = $request->istruttore ;
        $corsi->descrizione=  $request->descrizione;
        $corsi->update();
        return redirect('/corsi/'.$corsi->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Corso $corsi)
    {
        $corsi->delete();
        return redirect()->back();
    }
}
