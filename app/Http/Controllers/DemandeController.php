<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json([
            "demande" => Demande::all()
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
            "type_demande" => "required|string",
            "me"           => "required|string",
            "lastname"     => "required|string",
            "firstname"    => "required|string",
            "email"        => "required|email",
            "city"         => "required|string",
            "code_postal"  => "required|string",
            "type_bien"    => "required|string",
            "price_max"    => "nullable|string",
            "room"         => "nullable|integer",
            "surface"      => "nullable|string",
            "salle_bain"   => "nullable|integer",
            "description"  => "nullable|string",
            "is_allow"     => "boolean",
        ]);

        $demande = Demande::create($validated);

        return response()->json([
            "demande" => $demande,
            "message" => "Demande envoyée avec succès"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Demande $demande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demande $demande)
    {
        //
    }
}
