<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Person;
// use App\Models\Expense;
use App\Http\Requests\StoreCensusRequest;
use App\Http\Requests\UpdateCensusRequest;

class CensusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employees = DB::table('users')->get();
        $people = Person::all();
        return $people;
        // return view('admin.employees.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCensusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCensusRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect('add-blog-post-form')->with('status', 'Blog Post Form Data Has Been inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Census  $census
     * @return \Illuminate\Http\Response
     */
    public function show(Census $census)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Census  $census
     * @return \Illuminate\Http\Response
     */
    public function edit(Census $census)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCensusRequest  $request
     * @param  \App\Models\Census  $census
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCensusRequest $request, Census $census)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Census  $census
     * @return \Illuminate\Http\Response
     */
    public function destroy(Census $census)
    {
        //
    }
}
