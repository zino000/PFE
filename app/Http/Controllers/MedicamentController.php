<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return medicament::select('id','NOM','PRESENTATION')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NOM' => 'required',
            'PRESENTATION' => 'required',
        ]);
        medicament::create($request->post());
        return response()->json([
            'message' => 'Medicament created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(medicament $medicament)
    {
        return response()->json([
            'medicament' => $medicament
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, medicament $medicament)
    {
        $request->validate([
            'NOM' => 'required',
            'PRESENTATION' => 'required',
        ]);
        $medicament->fill($request->post())->update();
        return response()->json([
            'message' => 'Medicament updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(medicament $medicament)
    {
        $medicament->delete();
        return response()->json([
            'message' => 'Medicament deleted successfully'
        ]);
    }
}
