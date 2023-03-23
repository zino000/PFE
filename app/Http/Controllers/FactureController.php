<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Facture::select('id','PRIX')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'PRIX' => 'required',
        ]);
        Facture::create($request->post());
        return response()->json([
            'message' => 'Facture created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Facture $Facture)
    {
        return response()->json([
            'Facture' => $Facture
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facture $Facture)
    {
        $request->validate([
            'PRIX' => 'required',
        ]);
        $Facture->fill($request->post())->update();
        return response()->json([
            'message' => 'Facture updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facture $Facture)
    {
        $Facture->delete();
        return response()->json([
            'message' => 'Facture deleted successfully'
        ]);
    }
}
