<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Farmacos;
use Illuminate\Http\Request;
use App\Http\Resources\V1\FarmacoResource;

class FarmacoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FarmacoResource::collection(Farmacos::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Farmacos $farmaco)
    {
        return new FarmacoResource($farmaco);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Farmacos $farmacos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Farmacos $farmaco)
    {
        if ($farmaco->delete()) {
            return response()->json([
                'message'=>'Success'
            ], 204);
        } 
        return response()->json([
            'message'=>'Not found'
        ], 404);
    }
}
