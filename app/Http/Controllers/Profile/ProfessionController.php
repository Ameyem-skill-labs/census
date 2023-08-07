<?php

namespace App\Http\Controllers\Profile;

use App\Models\Category;
use App\Models\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $professions = Profession::with('category')->get();

        return compact('categories', 'professions');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        $profession=Profession::create($validatedData);

        return $profession;
    }
}
