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
        $data = Property::with('images')->orderBy('id', 'desc')->get();
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
                // 'piece' => 'nullable|array',
                // 'piece.*.nom' => 'required|string|max:255',
                // 'piece.*.nombre' => 'required|integer|min:0',
                'caracteristique' => 'nullable|array',
                'caracteristique.*.nom' => 'required|string|max:255',
                'images' => 'nullable|array',
                'images.*.nom' => 'nullable|string|max:255',
                'images.*.data' => 'nullable|string',
                'measure' => 'nullable|string|max:50',
                'agentId' => 'nullable|integer',
                'cityId' => 'nullable|integer',
                'communeId' => 'nullable|integer',
                'propertyId' => 'nullable|integer',
                'statusPropertyId' => 'nullable|integer',
                // 'isDisponible' => 'nullable|boolean',
                'superficie' => 'nullable|string|max:50',
                'prix' => 'required|numeric|min:0',
                'partPayed' => 'nullable|integer|max:255',
                'countryId' => 'required|integer',
                'codePostal' => 'nullable|string|max:20',
                'salleBain' => 'nullable|integer|min:0',
                'cuisine' => 'nullable|integer|min:0',
                'garage' => 'nullable|integer|min:0',
                'chambre' => 'nullable|integer|min:0',
            ]);

            // return response()->json([
            //     'success' => true,
            //     'maison' => $validated
            // ]);
            // Création de la maison
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
