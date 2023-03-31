<?php

namespace App\Http\Controllers;

use App\Models\Ordonnance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdonnanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ordonnance::select('id','date_ordonnance','id_consult')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date_ordonnance' => 'required',
            'id_consult' => 'required'
        ]);
        ordonnance::create($request->post());
        return response()->json([
            'message' => 'Ordonnance created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ordonnance $ordonnance)
    {
        return response()->json([
            'ordonnance' => $ordonnance
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ordonnance $ordonnance)
    {
        $request->validate([
            'date_ordonnance' => 'required',
            'id_consult' => 'required'
        ]);
        $ordonnance->fill($request->post())->update();
        return response()->json([
            'message' => 'Ordonnance updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ordonnance $ordonnance)
    {
        $ordonnance->delete();
        return response()->json([
            'message' => 'Ordonnance deleted successfully'
        ]);
    }
}
