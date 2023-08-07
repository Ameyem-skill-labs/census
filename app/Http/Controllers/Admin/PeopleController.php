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
        if (! Gate::allows('person_access')) {
            // return abort(401);
            return 'not exit';
        }
        if ($filterBy = $request->input('filter')) {
            if ($filterBy == 'all') {
                Session::put('Person.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('Person.filter', 'my');
            }
        }

        $people = Person::all();
        // return $people;
        return view('admin.people.index', compact('people'));
    }

    public function printPeople(){
        $people = Person::all();
        // return $people;
        $people=dbarray2optionarray($people);
        return compact('people');

    }

    /**
     * Show the form for creating new ExpenseCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('person_create')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $states = \App\Models\State::get(["name", "id"]);

        $edu_qulifications = dbarray2optionarray(\App\Models\Qualification::get(["id","name" ]));
        $professions = dbarray2optionarray(\App\Models\Profession::get(["id","name" ])); 
        $pension_types =dbarray2optionarray(\App\Models\PensonerType::get(["id","name" ])); 
        $vehicle_types =dbarray2optionarray(\App\Models\VehicleType::get(["id","name" ]));  
        
        // $people = \App\Models\Person::get(["id","name" ]);
        // return $edu_qulifications;
        return view('admin.people.create', compact('states','created_bies','edu_qulifications','professions','pension_types','vehicle_types'));
    }

    /**
     * Store a newly created ExpenseCategory in storage.
     *
     * @param  \App\Http\Requests\StorePersonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonRequest $request)
    {
        if (! Gate::allows('person_create')) {
            return abort(401);
        }
        // return $request->all();//+ ['created_by_id' => Auth::user()->id];
        $person = Person::create($request->all()+ ['created_by_id' => Auth::user()->id]);


        return redirect()->route('admin.people.index');
    }


    /**
     * Show the form for editing ExpenseCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('person_edit')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $person = Person::findOrFail($id);

        return view('admin.people.edit', compact('person', 'created_bies'));
    }

    /**
     * Update ExpenseCategory in storage.
     *
     * @param  \App\Http\Requests\Admin\UpdatePersonRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonRequest $request, $id)
    {
        if (! Gate::allows('person_edit')) {
            return abort(401);
        }
        $person = Person::findOrFail($id);
        $person->update($request->all());



        return redirect()->route('admin.people.index');
    }


    /**
     * Display ExpenseCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('person_view')) {
            return abort(401);
        }

        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $person = Person::findOrFail($id);
        


        return view('admin.people.show', compact('person','created_bies'));
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
}
