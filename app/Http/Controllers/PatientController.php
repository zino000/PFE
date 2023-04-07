<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return patient::select('cin','id','nom','prenom','num_tel','genre','date_naissance')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cin' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'num_tel' => 'required',
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
            'cin' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'num_tel' => 'required',
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

    public function latest(){
        $lastTenRows = Patient::select('cin','id','nom','prenom','num_tel','genre','date_naissance')->latest('created_at')->limit(10)->get();
        return response()->json([
            'patients' => $lastTenRows
        ]);
    }

    public function patientExists(Request $request){
        $request->validate([
            'cin' => 'required'
        ]);
        try{
            $patient = Patient::where('cin',$request->cin)->firstorFail();
            return response()->json([
                'patient' => $patient->toArray()
            ]);
        }catch (ModelNotFoundException $e){
            return response()->json([
                'message' => 'null'
            ]);
        }
    }
}






