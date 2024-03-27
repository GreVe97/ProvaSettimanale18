<?php

namespace App\Http\Controllers;

use App\Models\Prenotazioni;
use App\Http\Requests\StorePrenotazioniRequest;
use App\Http\Requests\UpdatePrenotazioniRequest;
use Illuminate\Support\Facades\Auth;

class PrenotazioniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prenotazioni = Prenotazioni::with(['attivita.corsi'])
            ->with('user')
            ->where("user_id", "=", Auth::getUser()->id)->orderBy("stato")->get();

        /* return ($prenotazioni); */
        return view(
            'listaPrenotazioni',
            ['prenotazioni' => $prenotazioni]
        );

    }

    public function prenotazioniUtenti()
    {
        /*  if(Auth::user()->isAdmin){
             return Prenotazioni::with('attivita')->with('user')->get();
         }else(
             redirect()
         ) */
        $prenotazioni = Prenotazioni::with(['attivita.corsi', 'user'])->get()->sortBy("user.name");
        return view(
            'listaPrenotazioni',
            ['prenotazioni' => $prenotazioni]
        );

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrenotazioniRequest $request)
    {
        $nuovaPrenotazione = $request->only(["attivita_id"]);
        $nuovaPrenotazione["user_id"] = Auth::user()->id;
        Prenotazioni::create($nuovaPrenotazione);
        return redirect()->back();
    }


    /**
     * Display the specified resource.
     */
    public function show(Prenotazioni $prenotazioni)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prenotazioni $prenotazioni)
    {
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrenotazioniRequest $request, Prenotazioni $prenotazioni)
    {
        $prenotazioni->stato = $request->stato;
        $prenotazioni->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prenotazioni $prenotazioni)
    {
        $prenotazioni->delete();
        return redirect()->back();
    }
}
