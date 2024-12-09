<?php

namespace App\Http\Controllers;

use App\Models\Lifestyle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LifestyleController extends Controller
{
    public function index()
    {
        return view('admin.lifestyle.index', ['title' => "ADMIN | LIFESTYLE", "items" => Lifestyle::all()]);
    }

    public function create()
    {
        return view('admin.lifestyle.create', ['title' => "ADMIN | CREATE Lifestyle"]);
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

        $result = new Lifestyle();
        $result->name = $request->title;
        $result->description = $request->description;
        $result->image_path = 'uploads/' . $imageName;
        $result->user_id = auth()->user()->id;
        $result->status = "PUBLISHED";
        $result->hashtag = $request->hashtag;
        $result->save();
        return redirect()->route('lifestyle.index')->with('success', 'Lifestyle article created successfully!')->with('image', $imageName);
    }

    public function destroy($id)
    {
        $result = Lifestyle::find($id);
        if ($result->delete()) {
            return back()->with('success', 'Lifestyle article deleted successfully!');
        } else {
            return back()->with('success', 'Deleting Article Failed!');
        }
    }

    public function edit($id)
    {
        $result = Lifestyle::find($id);
        return view('admin.lifestyle.edit', ["items" => $result, 'title' => "Edit"]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'hashtag' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $result = Lifestyle::find($id);

        if (!$result) {
            return back()->with('error', 'Lifestyle article not found.');
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

        return redirect()->route('lifestyle.index')->with('success', 'Lifestyle article updated successfully!');
    }
}
