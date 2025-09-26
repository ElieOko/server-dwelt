<?php

namespace App\Http\Controllers;

use App\Models\TypeProperty;
use Illuminate\Http\Request;

class TypePropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = TypeProperty::all();
        $response = $data;
        return response(["type_property" => $response], 201);
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
        //
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
        ]);
        $data = TypeProperty::create($validated);

        return response()->json([
            'message' => 'Type de proprièté créé avec succès',
            'data' => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeProperty $typeProperty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeProperty $typeProperty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeProperty $typeProperty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeProperty $typeProperty)
    {
        //
    }
}
