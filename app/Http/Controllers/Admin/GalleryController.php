<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\ValidateGalleryRequest;

class GalleryController extends Controller
{
    public function store(ValidateGalleryRequest $request, Property $property): RedirectResponse
    {
        if($request->validated()){
            $path = $request->file('path')->store('properties/gallery', 'public');
            $property->galleries()->create(['path' => $path]);
        }

        return redirect()->route('admin.properties.edit', $property->id)->with([
            'message' => 'successfully created !',
            'alert-type' => 'success'
        ]);
    }

    public function edit(Property $property,Gallery $gallery): View
    {
        return view('admin.galleries.edit', compact('gallery', 'property'));
    }

    public function update(ValidateGalleryRequest $request,Property $property, Gallery $gallery): RedirectResponse
    {
        if($request->validated()){
            File::delete('storage/' . $gallery->path);
            $path = $request->file('path')->store('properties/gallery', 'public');
            $property->galleries()->update(['path' => $path]);
        }

        return redirect()->route('admin.properties.edit', $property->id)->with([
            'message' => 'successfully updated !',
            'alert-type' => 'info'
        ]);
    }

    public function destroy(Property $property,Gallery $gallery): RedirectResponse
    {
        if($gallery->path){
            File::delete('storage/' . $gallery->path);
        }
        $gallery->delete();

        return back()->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
