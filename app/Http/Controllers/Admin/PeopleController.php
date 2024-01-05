<?php

namespace App\Http\Controllers\Admin;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\StorePersonRequest;
use App\Http\Requests\Admin\UpdatePersonRequest;
use App\Models\PlaceRelated\Village;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
function dbarray2optionarray($dbarray)
        {
        // return function ($v) use ($max) { return $v > $max; };
            $optionarray=[];
            foreach( $dbarray as $option){
                $optionarray[$option->id] = $option->name;
            };
            return $optionarray;

        }
class PeopleController extends Controller
{
     /**
     * Display a listing of ExpenseCategory.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request)
     {
         $village_id = $request->input('village_id');
         $is_approved=$request->input('is_approved');
         $is_submitted=$request->input('is_submitted');
         $district_id = $request->input('district_id'); 
         $offset = $request->input('offset', 0);
         $limit = $request->input('limit', 20); // Default limit set to 20
     
         $user = Auth::user();
         Log::info('index request data: ' . json_encode($request->all()));
         // Create the base query
         $query = Person::with([
             'created_by' => function ($query) {
                 $query->select('id', 'name', 'surname', 'mobile');
             }, 
             'village' => function ($query) {
                 $query->select('id', 'name', 'mandal_id');
             }, 
             'village.mandal' => function ($query) {
                 $query->select('id', 'name');
             }
         ]);
     
         if ($village_id) {
            $query->where('village_id', $village_id);
        } elseif ($district_id) {
            $villageIds = Village::whereHas('mandal', function ($query) use ($district_id) {
                $query->where('district_id', $district_id);
            })->pluck('id');
        
            $query->whereIn('village_id', $villageIds);
        
            if (isset($is_approved)) {
                $query->where('is_approved', $is_approved);
            }
            if (isset($is_submitted)) {
                $query->where('is_submitted', $is_submitted);
            }
        } else {
            $query->where('created_by_id', $user->id);
            
            if (isset($is_approved)) {
                $query->where('is_approved', $is_approved);
            }
            if (isset($is_submitted)) {
                $query->where('is_submitted', $is_submitted);
            }
        }
        
         
     
         $people = $query->skip($offset)->take($limit)->get();
     
         // Adjust the result to include only required village and mandal details
         $people->transform(function ($person) {
             if ($person->village) {
                 $person->village->makeHidden(['created_by_id', 'created_at', 'updated_at']);
                 if ($person->village->mandal) {
                     $person->village->mandal->makeHidden(['assembly_constituency_id', 'district_id', 'created_at', 'updated_at']);
                 }
             }
             return $person;
         });
     
         return response()->json($people);
     }
     
   

    public function printPeople(){
        $people = Person::all();
        // return $people;
        $people=dbarray2optionarray($people);
        return compact('people');

    }

    
    /**
     * Store a newly created ExpenseCategory in storage.
     *
     * @param  \App\Http\Requests\StorePersonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        Log::info('User data: ' . json_encode($request->all()));
        // if (!Gate::allows('person_create')) {
        //     return abort(401);
        // }
        // return $request->all();//+ ['created_by_id' => Auth::user()->id];
        $person = Person::create($request->all()+ ['created_by_id' => Auth::user()->id]);
        $person->load(['created_by' => function ($query) {
            $query->select('id', 'name', 'surname', 'mobile');
        }]);
        
        return $person;
        // return redirect()->route('admin.people.index');
    }



/**
 * Update Person in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    // if (! Gate::allows('person_edit')) {
    //     return abort(401);
    // }

    $person = Person::findOrFail($id);

    // Update the person with new data
    $person->update($request->all());

    $person->load(['created_by' => function ($query) {
        $query->select('id', 'name', 'surname', 'mobile');
    }]);
    
    return $person;

}

// Inside PeopleController

public function uploadPhoto(Request $request)
{
    // if (! Gate::allows('person_create')) {
    //     return abort(401);
    // }
    Log::info('uploadPhoto: ' . json_encode($request->all()));

    if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
        $photo = $request->file('photo');

        // Validate the photo size and type here if needed

        // Generate a unique file name
        $fileName = time() . '_' . Str::slug($photo->getClientOriginalName()) . '.' . $photo->getClientOriginalExtension();
        
        // Move the file to the uploads directory
        $photo->move(public_path('uploads'), $fileName);

        // Return the file path
        // return response()->json(['status' => 'success', 'file_path' => url('uploads/' . $fileName)]);
        return response()->json(['status' => 'success', 'file_path' =>'uploads/' . $fileName]);
    }

    return response()->json(['status' => 'error', 'message' => 'Invalid file or no file uploaded'], 400);
}


public function getUserVillages(Request $request)
{

    
    $user = Auth::user();
    Log::info('$request->input data: ');

    // Fetching unique village IDs created by the user
    $villageIds = Person::where('created_by_id', $user->id)
                         ->distinct()
                         ->pluck('village_id');

    // Fetch the details of each unique village and count the number of people
    $villages = Village::whereIn('id', $villageIds)
                       ->withCount('people') // Assuming you have a 'people' relation in your Village model
                       ->get()
                       ->map(function ($village) {
                           $villageDetails = $village->getAddress();
                           $villageDetails['people_count'] = $village->people_count;
                           return $villageDetails;
                       });

    return response()->json($villages);
}


    
    /**
     * Remove ExpenseCategory from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('person_delete')) {
            return abort(401);
        }
        $person = Person::findOrFail($id);
        $person->delete();

        return redirect()->route('admin.people.index');
    }


    
    /**
     * Delete all selected ExpenseCategory at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('person_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Person::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

    

    /**
     * Get a list of all subPlaces for a given place.
     *
     * @param string $placeType The type of place (e.g., 'Country', 'State', etc.).
     * @param int    $placeId   The ID of the place.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSubPlacesPeopleCount(Request $request)
    {
        $placeType = $request->input('place_type');
        $placeId = $request->input('id');
        // Convert the place type to the corresponding model class name
        $modelClass = '\\App\\Models\\PlaceRelated\\' . Str::studly($placeType);
        // Check if the class exists
        if (!class_exists($modelClass)) {
            return response()->json(['error' => 'Invalid place type'], 400);
        }
        // Find the place by ID
        $place = $modelClass::find($placeId);
        if (!$place) {
            return response()->json(['error' => 'Place not found'], 404);
        }
        // Check if the totalPeopleCount method exists in the model
        if (method_exists($place, 'peopleCountBySubplace')) {
            $subPlaces = $place->peopleCountBySubplace();
        } else {
            return response()->json(['error' => 'Unable to get people count for this place type'], 400);
        }
        // return $place->totalPeopleCount();
        return response()->json($subPlaces);

    }

    /**
     * Get the total number of people for a given place.
     *
     * @param string $placeType The type of place (e.g., 'Country', 'State', etc.).
     * @param int    $placeId   The ID of the place.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTotalPeopleCount(Request $request)
    {
        $placeType = $request->input('place_type');
        $placeId = $request->input('id');
        // Convert the place type to the corresponding model class name
        $modelClass = '\\App\\Models\\PlaceRelated\\' . Str::studly($placeType);

        // Check if the class exists
        if (!class_exists($modelClass)) {
            return response()->json(['error' => 'Invalid place type'], 400);
        }

        // Find the place by ID
        $place = $modelClass::find($placeId);
        if (!$place) {
            return response()->json(['error' => 'Place not found'], 404);
        }

        // Check if the totalPeopleCount method exists in the model
        if (method_exists($place, 'totalPeopleCount')) {
            $peopleCount = $place->totalPeopleCount();
        } else {
            return response()->json(['error' => 'Unable to get people count for this place type'], 400);
        }

        return response()->json(['people_count' => $peopleCount]);
    }

}
