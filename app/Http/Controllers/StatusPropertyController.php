<?php

namespace App\Http\Controllers;

use App\Models\StatusProperty;
use Illuminate\Http\Request;

class StatusPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = StatusProperty::all();
        $response = $data;
        return response(["value" => $response], 201);
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
    }

    /**
     * Display the specified resource.
     */
    public function show(StatusProperty $statusProperty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StatusProperty $statusProperty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StatusProperty $statusProperty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StatusProperty $statusProperty)
    {
        //
    }
}
