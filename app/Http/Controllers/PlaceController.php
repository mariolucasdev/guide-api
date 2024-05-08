<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $places = Place::all();

        return $this->successResponse(
            message: 'List of all places',
            data: $places,
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|string',
            'alias' => 'required|string',
            'description' => 'required|string',
            'keywords' => 'required|string',
            'email' => 'required|email',
            'zip_code' => 'required|string',
            'address' => 'required|string',
            'number' => 'required|string',
            'complement' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'geo_location' => 'required|string',
            'phone' => 'required|string',
            'whatsapp' => 'required|string',
            'website' => 'required|string',
            'facebook' => 'required|string',
            'instagram' => 'required|string',
            'linkedin' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $place = Place::create($request->all());

        return $this->successResponse(
            message: 'Place created successfully',
            data: $place,
            status: 'success',
            code: 201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $place = Place::find($id);

        if(! $place) {
            return $this->errorResponse(
                message: 'Place not found',
                code: 404
            );
        }

        return $this->successResponse(
            message: 'Place found',
            data: $place,
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        //
    }
}
