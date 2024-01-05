<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Response;
use Redirect;
use App\Models\PlaceRelated\{Country, State, District,Mandal,Village};

class StateMandalController extends Controller
{
    public function index()
    {
        $data = State::where("country_id",1)->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchState(Request $request)
    {
        $data = State::where("country_id",1)->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchDistrict(Request $request)
    {
        $data = District::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchMandal(Request $request)
    {
        $data = Mandal::where("district_id",$request->district_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchVillage(Request $request)
    {
        $data = Village::where("mandal_id",$request->mandal_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchLoksabhaConstituency(Request $request)
    {
        $data = LoksabhaConstituency::where("state_id", $request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchAssemblyConstituency(Request $request)
    {
        $data = AssemblyConstituency::where("loksabha_constituency_id", $request->loksabha_constituency_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchAddress(Request $request)
{
    $validatedData = $request->validate([
        'placetype' => 'required|string', // Validate the type of place
        'place_id' => 'required|integer', // Validate the place id
    ]);

    $type = $validatedData['placetype'];
    $id = $validatedData['place_id'];

    if ($type === 'Village') {
        $place = Village::find($id);
        // Include village details
    } elseif ($type === 'Mandal') {
        $place = Mandal::find($id);
        // Include mandal and related district details
    }elseif ($type === 'AssemblyConstituency') {
        $place = AssemblyConstituency::find($id);
        // Include assembly constituency and related details
    } elseif ($type === 'LoksabhaConstituency') {
        $place = LoksabhaConstituency::find($id);
        // Include loksabha constituency and related details
    } elseif ($type === 'District') {
        $place = District::find($id);
        // Include district and related state details
    } elseif ($type === 'State') {
        $place = State::find($id);
        // Include district and related state details
    }
    

    if (!$place) {
        return response()->json(['error' => $type . ' not found'], 404);
    }

    // Construct the address data based on the type
    $data = $place->getAddress();

    return response()->json($data);
}

    public function storeVillage(Request $request)
    {
        // return $request;
        $data = Village::where("mandal_id",$request->mandal_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function show(Request $request)
    {

        $data['village'] = Village::where("id",$request->id)->first(["name", "id"]);
        
        return response()->json($data);

        // return view('admin.villages.show', compact('village', 'expenses'));
    }
}
