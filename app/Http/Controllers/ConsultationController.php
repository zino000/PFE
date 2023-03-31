<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return consultation::select('id','date_consult','temp_dep','temp_fin','id_pat','id_ser')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_consult' => 'required',
            'temp_dep' => 'required',
            'temp_fin' => 'required',
            'id_pat' => 'required',
            'id_ser' => 'required'
        ]);
        consultation::create($request->post());
        return response()->json([
            'message' => 'Consultation created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(consultation $consultation)
    {
        return response()->json([
            'consultation' => $consultation
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, consultation $consultation)
    {
        $request->validate([
            'date_consult' => 'required',
            'temp_dep' => 'required',
            'temp_fin' => 'required',
            'id_pat' => 'required',
            'id_ser' => 'required'
        ]);
        $consultation->fill($request->post())->update();
        return response()->json([
            'message' => 'Consultation updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(consultation $consultation)
    {
        $consultation->delete();
        return response()->json([
            'message' => 'Consultation deleted successfully'
        ]);
    }
}
