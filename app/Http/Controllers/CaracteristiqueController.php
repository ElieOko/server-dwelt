<?php

namespace App\Http\Controllers;

use App\Models\Caracteristique;
use Illuminate\Http\Request;

class CaracteristiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Caracteristique::all();
        $response = $data;
        return  response(["value" => $response], 201);
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
            'name' => 'required|string|max:255',
        ]);
        $data = Caracteristique::create($validated);

        return response()->json([
            'message' => 'Type de proprièté créé avec succès',
            'data' => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Caracteristique $caracteristique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Caracteristique $caracteristique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Caracteristique $caracteristique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Caracteristique $caracteristique)
    {
        //
    }
}
