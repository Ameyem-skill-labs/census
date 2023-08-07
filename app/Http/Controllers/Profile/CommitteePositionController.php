<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Models\ProfileRelated\CommitteePosition;
use App\Models\ProfileRelated\CommitteeCategory;
use App\Models\ProfileRelated\CommitteeType;
use App\Models\ProfileRelated\CommitteeSubCategory;
use App\Models\ProfileRelated\CommitteePositionName;

class CommitteePositionController extends Controller
{

    public function create()
    {
        $categories = CommitteeCategory::all();
        $types = CommitteeType::all();
        $subCategories = CommitteeSubCategory::all();
        $positionNames = CommitteePositionName::all();

        return  compact('categories', 'types', 'subCategories', 'positionNames');
    }

    public function store(Request $request)
    {
        $position = new CommitteePosition;
        $position->category_id = $request->input('category_id');
        $position->type_id = $request->input('type_id');
        $position->sub_category_id = $request->input('sub_category_id');
        $position->position_id = $request->input('position_id');
        $position->date_of_start = $request->input('date_of_start');
        $position->date_of_end = $request->input('date_of_end');
        $position->save();

        return redirect()->back()->with('success', 'Position saved successfully!');
    }
}

