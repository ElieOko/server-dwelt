<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\ImageProperty;
use Illuminate\Support\Facades\Log;
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
        $data = Property::with('images', 'status_property', 'city', 'commune', 'agent', 'country', 'type_property')->where('isDisponible', true)->orderBy('id', 'desc')->get();
        $response = $data;
        return  response(["data" => $response], 201);
    }
    public function getAll()
    {
        //
        $data = Property::with('images', 'status_property', 'city', 'commune', 'agent', 'country', 'type_property')->orderBy('id', 'desc')->get();
        $response = $data;
        return  response(["data" => $response], 201);
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

            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'caracteristique' => 'nullable|array',
                'caracteristique.*.nom' => 'required|string|max:255',
                'images' => 'nullable|array',
                'images.*.nom' => 'nullable|string|max:255',
                'images.*.data' => 'nullable|string',
                'measure' => 'nullable|string|max:50',
                'agentId' => 'required|integer',
                'cityId' => 'required|integer',
                'communeId' => 'required|integer',
                'propertyTypeId' => 'required|integer',
                'partPayed' => 'nullable|string',
                'statusPropertyId' => 'nullable|integer',
                'superficie' => 'nullable|string|max:50',
                'prix' => 'required|numeric|min:0',
                'countryId' => 'required|integer',
                'codePostal' => 'nullable|string|max:20',
                'salleBain' => 'nullable|integer|min:0',
                'cuisine' => 'nullable|integer|min:0',
                'garage' => 'nullable|integer|min:0',
                'chambre' => 'nullable|integer|min:0',
            ]);

            $property = Property::create($validated);

            // Traitement des images si présentes

            if (!empty($request->images)) {
                foreach ($request->images as $img) {
                    if (!isset($img['data'])) continue;

                    if (!preg_match('/^data:image\/(\w+);base64,/', $img['data'], $type)) {
                        return response()->json([
                            'success' => false,
                            'message' => "Format d'image non supporté ou Base64 invalide pour l'image: {$img['nom']}"
                        ], 422);
                    }

                    $decodedImage = base64_decode(substr($img['data'], strpos($img['data'], ',') + 1));
                    if ($decodedImage === false) {
                        return response()->json([
                            'success' => false,
                            'message' => "Erreur lors du décodage de l'image Base64: {$img['nom']}"
                        ], 422);
                    }

                    $extension = strtolower($type[1]);
                    $fileName = 'property_' . $property->id . '_' . uniqid() . '.' . $extension;
                    $path = 'properties/' . $fileName;

                    Storage::disk('public')->put($path, $decodedImage);

                    ImageProperty::create([
                        'nom' => $img['data'],
                        'path' => $path,
                        'maison_id' => $property->id
                    ]);
                }
            }


            return response()->json([
                'success' => true,
                'maison' => $property
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
    public function show(int $id)
    {
        // Récupère la propriété avec toutes ses relations
        $property = Property::with([
            'images',
            'status_property',
            'city',
            'commune',
            'agent',
            'country',
            'type_property'
        ])->find($id); // ou ->where('id', $id)->first();

        if (!$property) {
            return response()->json([
                'message' => 'Property not found'
            ], 404);
        }

        return response()->json([
            'data' => $property
        ], 200);
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
    public function update(Request $request, $id)
    {
        try {
            // Récupérer la propriété existante
            $property = Property::findOrFail($id);

            // Validation des champs (sans images)
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                // 'caracteristique' => 'nullable|array',
                // 'caracteristique.*.nom' => 'required|string|max:255',
                // 'measure' => 'nullable|string|max:50',
                // 'agentId' => 'required|integer',
                // 'cityId' => 'required|integer',
                // 'communeId' => 'required|integer',
                // 'propertyTypeId' => 'required|integer',
                // 'partPayed' => 'nullable|string',
                // 'statusPropertyId' => 'nullable|integer',
                'isDisponible' => 'required|boolean', // Ajout ici
                // 'superficie' => 'nullable|string|max:50',
                // 'prix' => 'required|numeric|min:0',
                // 'countryId' => 'required|integer',
                // 'codePostal' => 'nullable|string|max:20',
                // 'salleBain' => 'nullable|integer|min:0',
                // 'cuisine' => 'nullable|integer|min:0',
                // 'garage' => 'nullable|integer|min:0',
                // 'chambre' => 'nullable|integer|min:0',
            ]);

            // Mise à jour
            $property->update($validated);

            return response()->json([
                'success' => true,
                'maison' => $property
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Propriété introuvable'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue: ' . $e->getMessage()
            ], 500);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        // Supprimer la propriété
        $property->delete();

        return response()->json([
            'success' => true,
            'message' => 'Propriété supprimée avec succès'
        ]);
    }
}
