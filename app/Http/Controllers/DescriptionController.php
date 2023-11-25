<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DescriptionController extends Controller
{
    public function index()
    {
        // Retrieve all descriptions
        $descriptions = Description::all();
        return response()->json($descriptions);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'text' => 'required|string',
        ]);

        // Create a new description
        $description = Description::create($validatedData);

        return response()->json($description, 201);
    }

    // Implement update and delete methods as needed
}