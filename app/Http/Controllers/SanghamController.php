<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SnghamRelated\Sangham;
use App\Models\SnghamRelated\Member;
use App\User;
use Illuminate\Support\Facades\DB;

class SanghamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }
    public function getSanghams(){
        $user = auth()->user();

        if ($user === null) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }
    $sanghams = Sangham::select('id', 'name', 'about')
    ->take(50)
    ->get();
    // return $sanghams;
    $properUsers=[];
        foreach ($sanghams as $sangham) {
            $properUsers[] = $sangham->properSangham();
        }    
        return response()->json($properUsers);
    }

    public function getMembers(int $sangh_id){
        $user = auth()->user();
        // return $sangh_id;

        if ($user === null) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }
        $members = Member::select('id', 'user_id', 'sangham_id','position_id')
        ->where('sangham_id', $sangh_id)
        ->take(50)
        ->get();
        foreach ($members as $member) {
            $properMembers[] = $member->properMember();
        }    
        return response()->json($properMembers);
    }

    
    function convertArray2LabelValues($contents,$label){
        foreach ($contents as $value) {
            $mappedArray[] = [
                'label' => $value->{$label},
                'value' => $value->id,
            ];
        } 
        return $mappedArray;
    }

    public function storeNewsangham(Request $request)
    {
        $user = Auth::user();       
        // return $request->all();
        try{
            \App\Models\SnghamRelated\Sangham::create($request->all()+ ['created_by_id' => $user->id]);
            }catch(\Illuminate\Database\QueryException $e){
                return ['error'=>$e->getMessage()];
            }
        return response()->json(\App\Models\SnghamRelated\Sangham::where('name',$request->name)->first());
    }

    public function storeNewmember(Request $request)
    {
        $user = Auth::user();       
        // return $request->all();
        try{
            \App\Models\SnghamRelated\Member::create($request->all());
            }catch(\Illuminate\Database\QueryException $e){
                return ['error'=>$e->getMessage()];
            }
        $member=\App\Models\SnghamRelated\Member::where('user_id',$request->user_id)
        ->where('sangham_id',$request->sangham_id)->first();
        return response()->json($member->properMember());
        
    }

    


    public function handleAction($action) {
        
        $methodName = 'get' . ucfirst($action);
    
        if (method_exists($this, $methodName)) {
                return $this->{$methodName}($action);   
        } else {
            abort(404);
        }
    }

    public function getJurisdiction ($action) {
        $contents = \App\Models\SnghamRelated\Jurisdiction::select('id','jurisdiction')->get();
    
        return response()->json($this->convertArray2LabelValues($contents,'jurisdiction'));
    }
    public function getPosition ($action) {
        $contents = \App\Models\SnghamRelated\Position::select('id','position_telugu')->get();
        // return $contents;
        return response()->json($this->convertArray2LabelValues($contents,'position_telugu'));
    }

}
