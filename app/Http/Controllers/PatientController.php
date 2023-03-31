<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return patient::select('id','nom','prenom','genre','date_naissance')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'genre' => 'required',
            'date_naissance' => 'required'
        ]);
        patient::create($request->post());
        return response()->json([
            'message' => 'Patient created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(patient $patient)
    {
        return response()->json([
            'patient' => $patient
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, patient $patient)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'genre' => 'required',
            'date_naissance' => 'required'
        ]);
        $patient->fill($request->post())->update();
        return response()->json([
            'message' => 'Patient updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(patient $patient)
    {
        $patient->delete();
        return response()->json([
            'message' => 'Patient deleted successfully'
        ]);
    }
}






