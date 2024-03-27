<?php

namespace App\Http\Controllers;

use App\Models\Attivita;
use App\Http\Requests\StoreAttivitaRequest;
use App\Http\Requests\UpdateAttivitaRequest;

class AttivitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(StoreAttivitaRequest $request)
    {
        return view('creaAttivita',["corso_id"=>$request->corso_id]) ;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttivitaRequest $request)
    {
        $nuovaAttivita =  $request->only(['nome','descrizione','corso_id','giorno','ora',"sala"]);
        Attivita::create($nuovaAttivita);
         return redirect('corsi/'.$request->corso_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Attivita $attivitum)
    {
        return view("infoAttività",["attivita"=>$attivitum->load("corsi")->load("prenotazioni")] ) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attivita $attivitum)
    {
        return view('modificaAttivita',['attivita'=>$attivitum]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAttivitaRequest $request, Attivita $attivitum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attivita $attivitum)
    {
        $attivitum->delete();
        return redirect()->back();
    }
}
