<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use App\Models\Property;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Admin\ValidateFeatureRequest;

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
        abort_if(Gate::denies('property_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if($property->agent->name != auth()->user()->name && auth()->user()->roles()->where('title', 'agent')->count() > 0){
            abort(403);
         }
         
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
        abort_if(Gate::denies('property_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if($property->agent->name != auth()->user()->name && auth()->user()->roles()->where('title', 'agent')->count() > 0){
            abort(403);
         }

        $feature->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
