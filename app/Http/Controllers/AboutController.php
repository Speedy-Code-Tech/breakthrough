<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.about.index', ['title' => "ADMIN | About", "items" => About::all()]);
    }
    public function create()
    {
        return view('admin.about.create', ['title' => "ADMIN | About"]);
    }

    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'members.*.fname' => 'required|string',
            'members.*.lname' => 'required|string',
            'members.*.mname' => 'nullable|string',
            'members.*.position' => 'required|string',
            'members.*.image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
    
        // Iterate over each member's data
        foreach ($request->members as $member) {
            $result = new About();
    
            // Handle image upload
            if (isset($member['image']) && $member['image'] instanceof \Illuminate\Http\UploadedFile) {
                // Store the file in 'public/uploads' and save the relative path
                $imagePath = $member['image']->storeAs('public/uploads', $member['image']->hashName(), 'public');
                $result->image_path = str_replace('public/', '', $imagePath); // Save relative path as 'uploads/filename.ext'
            } else {
                throw new \Exception('Invalid file upload.');
            }
    
            // Assign other member details to the model
            $result->user_id = auth()->user()->id;
            $result->fname = $member['fname'];
            $result->lname = $member['lname'];
            $result->mname = $member['mname'];
            $result->position = $member['position'];
    
            // Save the record
            $result->save();
        }
    
        // Redirect to the index route with a success message
        return redirect()->route('about.index')->with('success', 'Team members added successfully!');
    }
    

    public function destroy($id)
    {
        $result = About::find($id);
        if ($result->delete()) {
            return back()->with('success', 'Officer deleted successfully!');
        } else {
            return back()->with('success', 'Deleting Article Failed!');
        }
    }

    public function edit($id)
{
    $about = About::findOrFail($id); // Find the officer by ID
    return view('admin.about.edit', [
        'title' => "ADMIN | Edit Officer",
        'officer' => $about,
    ]);
}

public function update(Request $request, $id)
{
    $about = About::findOrFail($id);

    // Validate the input
    $request->validate([
        'fname' => 'required|string',
        'lname' => 'required|string',
        'mname' => 'nullable|string',
        'position' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg',
    ]);

    // Update the fields
    $about->fname = $request->fname;
    $about->lname = $request->lname;
    $about->mname = $request->mname;
    $about->position = $request->position;

    // Handle image upload if provided
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->storeAs('public/uploads', $request->file('image')->hashName(), 'public');
        $about->image_path = str_replace('public/', '', $imagePath); // Save relative path
    }

    $about->save();

    return redirect()->route('about.index')->with('success', 'Officer updated successfully!');
}

}
