<?php

namespace App\Http\Controllers;

use App\Models\Extra;
use App\Models\Property;
use App\Models\PropertyAssets;
use App\Models\PropertyCategory;
use Carbon\Carbon;
use ErrorException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        try {
            if ($request->country_code == country()->code):
                $input = $request->except(array('cat_id', 'property_id'));
                $input['category_id'] = decrypt($request->cat_id);
                $input['updated_by'] = $request->user()->id;
                if ($request->property_id != 0):
                    $property = Property::find($request->property_id);
                    $property->update($input);
                else:
                    $input['property_number'] = uniqueId(Property::class, 'property_number');
                    $input['created_by'] = $request->user()->id;
                    $property = Property::create($input);
                endif;
                return response()->json([
                    'message' => 'Property updated successfully. Please continue to providing addional details',
                    'type' => 'success',
                    "property" => $property,
                ]);
            else:
                return response()->json([
                    'message' => "The location you have selected might invalid. Please switch your contry and try again",
                    'type' => 'error',
                    'property' => null
                ]);
            endif;
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'type' => 'error',
                'property' => null,
            ]);
        }
    }

    public function storeAssets(Request $request)
    {
        $request->validate([
            'property_id' => 'required',
        ]);
        try {
            if ($request->property_id > 0):
                if ($request->hasFile('files')):
                    foreach ($request->file('files') as $file):
                        $fname = time() . '_' . $file->getClientOriginalName();
                        $storeFile = $file->storeAs('/property/images/' . $request->property_id . '/', $fname, 'gcs');
                        $url = Storage::disk('gcs')->url($storeFile);
                        $files[] = [
                            'property_id' => $request->property_id,
                            'asset_url' => $url,
                            'asset_type' => $file->extension(),
                            'created_by' => $request->user()->id,
                            'updated_by' => $request->user()->id,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ];
                    endforeach;
                    PropertyAssets::insert($files);
                else:
                    return response()->json([
                        'error' => "Select an Image",
                        'type' => 'error',
                    ]);
                endif;
            else:
                return response()->json([
                    'error' => "Property Id Unavaialable!",
                    'type' => 'error',
                ]);
            endif;
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'type' => 'error',
            ]);
        }
        return response()->json([
            'success' => 'Assets successfully updated',
            'type' => 'success',
        ]);
    }

    function success()
    {
        return view('success');
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
