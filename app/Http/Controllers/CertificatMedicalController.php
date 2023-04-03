<?php

namespace App\Http\Controllers;

use App\Models\CertificatMedical;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CertificatMedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        return certificatmedical::select('id','nb_jrs','date','id_consult')->where('id_consult',$request->id)->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nb_jrs' => 'required',
            'date' => 'required',
            'id_consult' => 'required'
        ]);
        certificatmedical::create($request->post());
        return response()->json([
            'message' => 'Certificat Medical created successfully'
        ]); //
    }

    /**
     * Display the specified resource.
     */
    public function show(certificatmedical $certificatmedical)
    {
        return response()->json([
            'certificatmedical' => $certificatmedical
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, certificatmedical $certificatmedical)
    {
        $request->validate([
            'nb_jrs' => 'required',
            'date' => 'required',
            'id_consult' => 'required'
        ]);
        $certificatmedical->fill($request->post())->update();
        return response()->json([
            'message' => 'Certificat Medical updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(certificatmedical $certificatmedical)
    {
        $certificatmedical->delete();
        return response()->json([
            'message' => 'Certificat Medical deleted successfully'
        ]);
    }
}
