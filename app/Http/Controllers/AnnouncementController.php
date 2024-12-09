<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    public function index()
    {   
        return view('admin.announcements.index', ['title' => "ADMIN | ANNOUNCEMENTS","items"=>Announcements::all()]);
    }
    
    public function create()
    {
        return view('admin.announcements.create', ['title' => "ADMIN | CREATE ANNOUNCEMENTS"]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'hashtag'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/uploads', $imageName, 'public');

        $result = new Announcements();
        $result->name = $request->title;
        $result->description = $request->description;
        $result->image_path = 'uploads/' . $imageName;
        $result->user_id = auth()->user()->id;
        $result->status = "PUBLISHED";
        $result->hashtag = $request->hashtag;
        $result->save();
        return redirect()->route('announcement.index')->with('success', 'Announcement article created successfully!')->with('image', $imageName);
    }

    public function destroy($id){
        $result = Announcements::find($id);
        if($result->delete()){
        return back()->with('success', 'Announcement article deleted successfully!');
        }else{
        return back()->with('success', 'Deleting Article Failed!');

        }
    }

    public function edit($id){
        $result = Announcements::find($id);
        return view('admin.announcements.edit',["items"=>$result,'title'=>"Edit"]);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'hashtag'=>'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg',
    ]);

    $result = Announcements::find($id);

    if (!$result) {
        return back()->with('error', 'Article article not found.');
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

    return redirect()->route('announcement.index')->with('success', 'Announcement article updated successfully!');
}

}
