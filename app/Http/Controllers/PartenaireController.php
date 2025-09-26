<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartenaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Partenaire::all();
        $response = $data;
        return  response(["partenaires" => $response], 201);
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
                'name' => 'required|string|max:255',
                'images' => 'nullable|array',
                'images.*.nom' => 'nullable|string|max:255',
                'images.*.data' => 'nullable|string',
            ]);

            $user = [];
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
                    $fileName = 'partenaire' .  '_' . uniqid() . '.' . $extension;
                    $path = 'partenaire/' . $fileName;

                    Storage::disk('public')->put($path, $decodedImage);

                    $user = Partenaire::create([
                        'name'    => $validated['name'],
                        'image' => $img['data'],
                        'path'   => $path,
                    ]);
                    return response()->json([
                        'message' => 'Partenaire créé avec succès',
                        'data' => $user
                    ], 201);
                }
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Partenaire $partenaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partenaire $partenaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partenaire $partenaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partenaire $partenaire)
    {
        //
    }
}
