<?php

namespace App\Http\Controllers\Admin;

// use App\Models\Village;
use \App\Models\PlaceRelated\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\Admin\StoreVillageRequest;
class VillageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }
    /**
     * Display a listing of ExpenseCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (! Gate::allows('villages_access')) {
            // return abort(401);
            return 'not exit';
        }
        if ($filterBy = $request->input('filter')) {
            if ($filterBy == 'all') {
                Session::put('Village.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('Village.filter', 'my');
            }
        }

        $villages = Village::all();
        // return $villages;
        return view('admin.villages.index', compact('villages'));
    }

    /**
     * Show the form for creating new ExpenseCategory.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('village_create')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $states = \App\Models\State::get(["name", "id"]);
        // return $mandals[0];
        return view('admin.villages.create', compact('states','created_bies'));
    }

    /**
     * Store a newly created ExpenseCategory in storage.
     *
     * @param  \App\Http\Requests\StoreVillageRequest  $request
     * @return \Illuminate\Http\Response
     */
    function console_log($output, $with_script_tags = true) {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
    ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }
    public function store(Request $request)

    {
        // echo "on the command line";
        // return response()->json($request->all());
        $user=Auth::user();
        // if (! Gate::allows('village_create')) 
        // {
        //     return abort(401);
        // }

        try{
        //    Village::create($request->all()+ ['created_by_id' => $user->id]);

            Village::create($request->all()+ ['created_by_id' => $user->id]);


        }catch(\Illuminate\Database\QueryException $e){
            return ['error'=>$e->getMessage()];
        }
        
        // return $request->name;
        return response()->json(Village::where('name', $request->name)->first());
        // return Village::get()->where($request->name);
        // }

        // return 'not done';
        // return redirect()->route('admin.villages.index');
    }


    /**
     * Show the form for editing ExpenseCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('village_edit')) {
            return abort(401);
        }
        
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $village = Village::findOrFail($id);

        return view('admin.villages.edit', compact('village', 'created_bies'));
    }

    /**
     * Update ExpenseCategory in storage.
     *
     * @param  \App\Http\Requests\UpdateExpenseCategoriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseCategoriesRequest $request, $id)
    {
        if (! Gate::allows('village_edit')) {
            return abort(401);
        }
        $village = Village::findOrFail($id);
        $village->update($request->all());



        return redirect()->route('admin.villages.index');
    }


    /**
     * Display ExpenseCategory.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // return $request;
        if (! Gate::allows('village_view')) {
            return abort(401);
        }
        
        // $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        // $expenses = \App\Expense::where('village_id', $id)->get();

        // $village = Village::findOrFail($request->id);
        
        // return response()->json($village);

        $data['village'] = Village::where("id",$request->id)->first(["name", "id"]);
        
        return response()->json($data);

        // return view('admin.villages.show', compact('village', 'expenses'));
    }


    /**
     * Remove ExpenseCategory from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('village_delete')) {
            return abort(401);
        }
        $village = ExpenseCategory::findOrFail($id);
        $village->delete();

        return redirect()->route('admin.villages.index');
    }

    /**
     * Delete all selected ExpenseCategory at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('village_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ExpenseCategory::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
