<?php

namespace App\Http\Controllers\Admin;
use App\Models\{Country, State, District,Mandal, Village};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getNumbers()
    {
        // $todos = Todo::all();
        $nmandals=Mandal::get()->count();

        return response()->json([
            'status' => 'success',
            'nmandals' => $nmandals,
        ]);
    }

    // public function store(Request $request)
    // {
    //     // return $request;
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'required|string|max:255',
    //     ]);

    //     $todo = Todo::create([
    //         'title' => $request->title,
    //         'description' => $request->description,
    //     ]);

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Todo created successfully',
    //         'todo' => $todo,
    //     ]);
    // }

    // public function show($id)
    // {
    //     $todo = Todo::find($id);
    //     return response()->json([
    //         'status' => 'success',
    //         'todo' => $todo,
    //     ]);
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'required|string|max:255',
    //     ]);

    //     $todo = Todo::find($id);
    //     $todo->title = $request->title;
    //     $todo->description = $request->description;
    //     $todo->save();

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Todo updated successfully',
    //         'todo' => $todo,
    //     ]);
    // }

    // public function destroy($id)
    // {
    //     $todo = Todo::find($id);
    //     $todo->delete();

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'Todo deleted successfully',
    //         'todo' => $todo,
    //     ]);
    // }
}
