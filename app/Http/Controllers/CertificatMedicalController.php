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
    public function index()
    {
        return certificatmedical::select('id','NB_JRS_REPOS','DATE_REPOS')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NB_JRS_REPOS' => 'required',
            'DATE_REPOS' => 'required',
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
            'NB_JRS_REPOS' => 'required',
            'DATE_REPOS' => 'required',
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
