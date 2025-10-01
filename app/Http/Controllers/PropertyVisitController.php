<?php

namespace App\Http\Controllers;

use App\Models\PropertyVisit;
use Illuminate\Http\Request;

class PropertyVisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "visits" => PropertyVisit::with("property")->orderBy('id', 'desc')->get()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'maison_id'    => 'required|integer|max:255',
            'type_visite' => 'required|string|max:255',
            'date'        => 'required|date',
            'heure'       => 'required',
            'nom_complet' => 'required|string|max:255',
            'telephone'   => 'required|string|max:20',
            'message'     => 'nullable|string',
        ]);

        $visite = PropertyVisit::create($validated);

        return response()->json([
            "message" => "Demande de visite envoyée avec succès !!",
            "visit" => $visite
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(PropertyVisit $propertyVisit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PropertyVisit $propertyVisit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PropertyVisit $propertyVisit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyVisit $propertyVisit)
    {
        //
    }
}
