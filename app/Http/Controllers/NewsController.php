<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {

        return view('admin.news.index', ['title' => "ADMIN | NEWS", "news" => News::all()]);
    }

    public function create()
    {
        return view('admin.news.create', ['title' => "ADMIN | CREATE NEWS"]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/uploads', $imageName, 'public');

        $news = new News();
        $news->name = $request->title;
        $news->description = $request->description;
        $news->image_path = 'uploads/' . $imageName;
        $news->user_id = auth()->user()->id;
        $news->status = "PUBLISHED";
        $news->save();
        return redirect()->route('news.index')->with('success', 'News article created successfully!')->with('image', $imageName);
    }

    public function destroy($id)
    {
        $news = News::find($id);
        if ($news->delete()) {
            return back()->with('success', 'News article deleted successfully!');
        } else {
            return back()->with('success', 'Deleting Article Failed!');
        }
    }

    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit', ["news" => $news, 'title' => "Edit"]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);

        $news = News::find($id);

        if (!$news) {
            return back()->with('error', 'News article not found.');
        }

        // Update fields
        $news->name = $request->title;
        $news->description = $request->description;
        $news->user_id = auth()->user()->id;
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($news->image_path && Storage::exists('public/' . $news->image_path)) {
                Storage::delete('public/' . $news->image_path);
            }

            // Store the new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/uploads', $imageName, 'public');
            $news->image_path = 'uploads/' . $imageName;
        }

        $news->save();

        return redirect()->route('news.index')->with('success', 'News article updated successfully!');
    }
}
