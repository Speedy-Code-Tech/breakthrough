<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return view('admin.gallery.index', ['title' => "ADMIN | Gallery", "items" => Gallery::all()]);
    }

    public function create()
    {
        return view('admin.gallery.create', ['title' => "ADMIN | CREATE GALLERY"]);
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'images.*' => 'required|image|mimes:jpeg,png,jpg',
    ]);

    $uploadedImages = [];

    // Initialize new Gallery record
    $result = new Gallery();
    $result->name = $request->title;
    $result->user_id = auth()->user()->id;
    $result->status = "PUBLISHED";

    if ($request->hasfile('images')) {
        foreach ($request->file('images') as $image) {
            // Store the file in the desired directory
            $path = $image->storeAs('public/uploads', $image->hashName(),'public');

            // Save only the accessible path
            $uploadedImages[] = 'uploads/' . $image->hashName();
        }
    }

    // Save the image paths as a comma-separated string
    $result->image_path = implode(',', $uploadedImages);
    $result->save();

    return redirect()
        ->route('gallery.index')
        ->with('success', 'Gallery Album created successfully!');
}

public function destroy($id)
    {
        $result = Gallery::find($id);
        if ($result->delete()) {
            return back()->with('success', 'Album deleted successfully!');
        } else {
            return back()->with('success', 'Deleting Album Failed!');
        }
    }

    
    public function edit($id)
    {
        $result = Gallery::find($id);
        return view('admin.gallery.edit', ["item" => $result, 'title' => "Edit"]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg',
        ]);
    
        $item = Gallery::findOrFail($id);
        $item->name = $request->title;
    
        // Handle image upload if new files are provided
        if ($request->hasfile('images')) {
            $uploadedImages = [];
    
            foreach ($request->file('images') as $image) {
                $path = $image->storeAs('public/uploads', $image->hashName(), 'public');
                $uploadedImages[] = 'uploads/' . $image->hashName(); // Save the public-accessible path
            }
    
            // Update the image_path column
            $item->image_path = implode(',', $uploadedImages);
        }
    
        $item->save();
    
        return redirect()
            ->route('gallery.index')
            ->with('success', 'Gallery updated successfully!');
    }
    
}
