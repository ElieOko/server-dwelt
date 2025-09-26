<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use App\Http\Resources\AgentCollection;
use Illuminate\Support\Facades\Storage;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Agent::all();
        if ($data->count() != 0) {
            return new AgentCollection($data);
        }
        return response()->json([
            "message" => "Ressource not found",
        ], 400);
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
                'role' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'phone' => 'nullable|string|max:20',
                'email' => 'required|email',
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
                    $fileName = 'agent' .  '_' . uniqid() . '.' . $extension;
                    $path = 'agent/' . $fileName;

                    Storage::disk('public')->put($path, $decodedImage);

                    $user = Agent::create([
                        'role' => $validated['role'],
                        "description" => $validated['description'],
                        'nom'    => $validated['nom'],
                        'email' => $validated['email'],
                        'phone' => $validated['phone'],
                        'image' => $img['data'],
                        'path'   => $path,
                    ]);
                    return response()->json([
                        'message' => 'Agent créé avec succès',
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
    public function show(Agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agent $agent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agent $agent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agent $agent)
    {
        //
    }
}
