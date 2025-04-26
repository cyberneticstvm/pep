<?php

namespace App\Http\Controllers;

use App\Models\Extra;
use App\Models\Property;
use App\Models\PropertyCategory;
use Carbon\Carbon;
use ErrorException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $category = PropertyCategory::findOrFail(decrypt($request->cid));
        $extras = Extra::orderBy('value')->get();
        $property = null;
        return view('property.create', compact('category', 'extras', 'property'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'formatted_address' => 'required',
        ]);
        try {
            $category = PropertyCategory::findOrFail(decrypt($request->cat_id));
            $extras = Extra::orderBy('value')->get();
            if ($request->country_code == country()->code):
                $input = $request->except(array('cat_id', 'property_id'));
                $input['category_id'] = decrypt($request->cat_id);
                $input['updated_by'] = $request->user()->id;
                if ($request->property_id != 0):
                    $property = Property::find(decrypt($request->property_id));
                    $property->update($input);
                    return view('property.create', compact('category', 'extras', 'property'))->with("success", "Property updated successfully");
                else:
                    $input['created_by'] = $request->user()->id;
                    $property = Property::create($input);
                    return view('property.create', compact('category', 'extras', 'property'))->with("success", "Property updated successfully");
                endif;
            //return redirect()->back()->with(["success" => "Property updated successfully", "property" => $property]);
            else:
                return redirect()->back()->with("error", "The location you have selected might invalid. Please switch your contry and try again");
            endif;
        } catch (Exception $e) {
            return redirect()->back()->with("error", $e->getMessage())->withInput($request->all());
        }
        /*return response()->json([
            'message' => 'dfsf'
        ]);*/
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
