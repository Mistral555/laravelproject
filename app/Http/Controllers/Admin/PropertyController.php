<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PropertyFormRequest;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;

class PropertyController extends Controller
{
    public function index()
    {
        return view('admin.properties.index',[
            'properties' => Property::orderBy('created_at', 'desc')->paginate(25),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        $property->fill([
            'surface' => 40,
            'rooms' => 3,
            'bedrooms' => 1,
            'floors' => 0,
            'city' => 'Bayonne',
            'postal_code' => 64100,
            'sold' => false,
        ]);
        return view('admin.properties.form', [
            'property' => $property,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        $property = Property::create($request->validated());
        

        return to_route('admin.property.index')->with('success', 'Property created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form', [
            'property' => $property,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());

        return to_route('admin.property.index')->with('success', 'Property updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();

        return to_route('admin.property.index')->with('success', 'Property deleted successfully.');
    }
}
