<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Admin\ValidatePropertyRequest;
use App\Models\User;

class PropertyController extends Controller
{
   
    public function index(): View
    {
        abort_if(Gate::denies('property_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if(auth()->user()->roles()->where('title', 'agent')->count() > 0) {
            $properties = Property::where('user_id', auth()->id())->get();
        }else {
            $properties = Property::all();
        }

        return view('admin.properties.index', compact('properties'));
    }

    public function create(): View
    {
        abort_if(Gate::denies('property_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $categories = Category::get();

        return view('admin.properties.create', compact('categories'));
    }

    public function store(ValidatePropertyRequest $request): RedirectResponse
    {
        abort_if(Gate::denies('property_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $slug = Str::slug($request->name, '-');
        
        $property = Property::create($request->validated() + ['slug' => $slug, 'user_id' => auth()->id()]);

        return redirect()->route('admin.properties.edit', $property->id)->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function show(Property $property): View
    {
        abort_if(Gate::denies('property_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.properties.show', compact('property'));
    }

    public function edit(Property $property): View
    {
         abort_if(Gate::denies('property_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
         if($property->agent->name != auth()->user()->name && auth()->user()->roles()->where('title', 'agent')->count() > 0){
            abort(403);
         }
         $categories = Category::get();

        return view('admin.properties.edit', compact('property', 'categories'));
    }

    public function update(ValidatePropertyRequest $request, Property $property): RedirectResponse
    {
        abort_if(Gate::denies('property_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       
        $slug = Str::slug($request->name, '-');

        $property->update($request->validated() + ['slug' => $slug,'user_id' => auth()->id()]);

        return redirect()->route('admin.properties.index')->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Property $property): RedirectResponse
    {
        abort_if(Gate::denies('property_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if($property->agent->name != auth()->user()->name){
            abort(403);
         }

        $property->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
