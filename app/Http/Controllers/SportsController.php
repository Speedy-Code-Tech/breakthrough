<?php

namespace App\Http\Controllers;

use App\Models\Sports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SportsController extends Controller
{
    public function index()
    {
        return view('admin.sports.index', ['title' => "ADMIN | Sports", "items" => Sports::all()]);
    }

    public function create()
    {
        return view('admin.sports.create', ['title' => "ADMIN | CREATE SPORTS"]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'hashtag' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/uploads', $imageName, 'public');

        $result = new Sports();
        $result->name = $request->title;
        $result->description = $request->description;
        $result->image_path = 'uploads/' . $imageName;
        $result->user_id = auth()->user()->id;
        $result->status = "PUBLISHED";
        $result->hashtag = $request->hashtag;
        $result->save();
        return redirect()->route('sports.index')->with('success', 'Sports article created successfully!')->with('image', $imageName);
    }

    public function destroy($id)
    {
        $result = Sports::find($id);
        if ($result->delete()) {
            return back()->with('success', 'Sports article deleted successfully!');
        } else {
            return back()->with('success', 'Deleting Article Failed!');
        }
    }

    public function edit($id)
    {
        $result = Sports::find($id);
        return view('admin.sports.edit', ["items" => $result, 'title' => "Edit"]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'hashtag' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $result = Sports::find($id);

        if (!$result) {
            return back()->with('error', 'Sports article not found.');
        }

        // Update fields
        $result->name = $request->title;
        $result->description = $request->description;
        $result->user_id = auth()->user()->id;
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($result->image_path && Storage::exists('public/' . $result->image_path)) {
                Storage::delete('public/' . $result->image_path);
            }

            // Store the new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/uploads', $imageName, 'public');
            $result->image_path = 'uploads/' . $imageName;
            $result->hashtag = $request->hashtag;
        }

        $result->save();

        return redirect()->route('sports.index')->with('success', 'Sports article updated successfully!');
    }
}
