<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return rendezvous::select('id','date_rdv','heure_rdv','nom','prenom','num_tel','ID_CONSULT')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_rdv' => 'required',
            'heure_rdv' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'num_tel' => 'required',
            'ID_CONSULT' => 'required'
        ]);
        RendezVous::create($request->post());
        return response()->json([
            'message' => 'Rendez Vous created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    /*
    public function show(rendezvous $RendezVous)
    {

        return response()->json([
            'RendezVous' => $RendezVous
        ]);
    }*/

    public function show($id)
    {
        $rendezVous = RendezVous::findOrFail($id);
        return response()->json($rendezVous);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date_rdv' => 'required',
            'heure_rdv' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'num_tel' => 'required',
            'ID_CONSULT' => 'required'
        ]);
        $rendezVous = RendezVous::findOrFail($id);
        $rendezVous->fill($request->post())->update();
        return response()->json([
            'message' => 'Rendez Vous updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rendezVous = RendezVous::findOrFail($id);
        $rendezVous->delete();
        return response()->json([
            'message' => 'Rendez Vous deleted successfully'
        ]);
    }
}
