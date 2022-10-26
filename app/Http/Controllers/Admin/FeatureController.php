<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\ValidateFeatureRequest;
use App\Models\Property;

class FeatureController extends Controller
{
    public function store(ValidateFeatureRequest $request,Property $property ): RedirectResponse
    {
        $property->features()->create($request->validated());

        return redirect()->route('admin.properties.edit', $property->id)->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function edit(Property $property, Feature $feature): View
    {
        return view('admin.features.edit', compact('feature', 'property'));
    }

    public function update(ValidateFeatureRequest $request,Property $property, Feature $feature): RedirectResponse
    {
        $property->features()->update($request->validated());

        return redirect()->route('admin.properties.edit', $property->id)->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Property $property,Feature $feature): RedirectResponse
    {
        $feature->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
