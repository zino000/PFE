<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use App\Models\Patient;
use App\Models\Service;
use App\Models\Facture;
use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;

class RendezVousController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return rendezvous::select('id','date_rdv','nom','prenom','temp_dep' ,'temp_fin','genre','num_tel','date_naissance','id_ser')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_rdv' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'temp_dep'=> 'required',
            'temp_fin' => 'require',
            'num_tel' => 'required',
            'genre'=> 'required',
            'date_naissance'=> 'required',
            'id_ser' => 'required'
        ]);

        RendezVous::create($request->post());
        return response()->json([
            'message' => 'Rendez Vous created successfully'
        ]);
    }

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
            'nom' => 'required',
            'prenom' => 'required',
            'temp_dep'=> 'required',
            'temp_fin' => 'required',
            'num_tel' => 'required',
            'genre'=> 'required',
            'date_naissance'=> 'required',
            'id_ser' => 'required'
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

    public function confirm($id){
        $rendezVous = RendezVous::findOrFail($id);
        
        $patient = new Patient();
        $patient->nom = $rendezVous->nom;
        $patient->prenom =$rendezVous->prenom;
        $patient->genre =$rendezVous->genre;
        $patient->date_naissance =$rendezVous->date_naissance;
        $patient->save();

        $consultation = new Consultation();
        $consultation->date_consult = $rendezVous->date_rdv;
        $consultation->temp_dep = $rendezVous->temp_dep;
        $consultation->temp_fin = $rendezVous->temp_fin;
        $consultation->id_pat =$patient->id;
        $consultation->id_ser = $rendezVous->id_ser;
        $consultation->save();

        $service = Service::find($rendezVous->id_ser);
        $facture = new facture();
        $facture->prix = $service->prix;
        $facture->id_consult = $consultation->id;
        $facture->save();

        return response()->json([
            'message' => 'Rendez Vous confirmed',
            'cosultation' => $consultation
        ],200);
    }
}
