<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        try {
            return response()->json([
                'success' => true,
                'maison' => ""
            ]);
            $validated = $request->validate([
                'nom' => 'required|string',
                'cityId' => 'required',
                'communeId' => 'required',
                'prix' => 'required|numeric|min:0',
                'superficie' => 'required|string',
                // ajouter d'autres règles si nécessaire
            ]);

            // Création de la maison
            $maison = Property::create($validated);

            // Traitement des images si présentes
            if ($request->has('images') && is_array($request->images)) {
                foreach ($request->images as $img) {
                    // $img['data'] contient la base64
                    $data = $img['data'];
                    $nom = $img['nom'];

                    // Décoder base64
                    if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
                        $data = substr($data, strpos($data, ',') + 1);
                        $type = strtolower($type[1]); // jpg, png, etc.

                        $data = base64_decode($data);

                        if ($data === false) {
                            continue; // skip si erreur
                        }

                        // Générer un nom de fichier unique
                        $filename = uniqid() . '_' . $nom;

                        // Stocker dans storage/app/public/maisons
                        Storage::disk('public')->put('maisons/' . $filename, $data);

                        // Optionnel : enregistrer le chemin dans une table images
                        $maison->images()->create([
                            'nom' => $filename,
                            'path' => 'storage/maisons/' . $filename,
                        ]);
                    }
                }
            }

            return response()->json([
                'success' => true,
                'maison' => $maison
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
    }
}
