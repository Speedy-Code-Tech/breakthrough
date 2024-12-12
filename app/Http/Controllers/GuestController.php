<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Announcements;
use App\Models\Entertainement;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Lifestyle;
use App\Models\News;
use App\Models\Request as ModelsRequest;
use App\Models\Sports;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        return view('guest.index', ['title' => 'Home']);
    }
    public function article($type)
    {
        $modal = null;
        $lower = strtolower($type);
        switch ($lower) {
            case 'news':
                $modal = new News();
                break;
            case 'entertainment':
                $modal = new Entertainement();
                break;
            case 'sports':
                $modal = new Sports();
                break;
            case 'literary':
                $modal = new Announcements();
                break;
            case 'event':
                $modal = new Event();
                break;
            case 'lifestyle':
                $modal = new Lifestyle();
                break;
        }
        if ($modal) {

            $latest = $modal->orderBy('created_at', 'desc')->first();
            $title = $type;
            $items = null;
            if ($latest) {
                $items = $modal->where('id', '!=', $latest->id)->get();
            }
            return view('guest.article', compact('latest', 'items', 'title'));
        }
    }
    public function newsview($type, $id)
    {
        $modal = null;
        $lower = strtolower($type);
        switch ($lower) {
            case 'news':
                $modal = new News();
                break;
            case 'entertainment':
                $modal = new Entertainement();
                break;
            case 'sports':
                $modal = new Sports();
                break;
            case 'literary':
                $modal = new Announcements();
                break;
            case 'event':
                $modal = new Event();
                break;
            case 'lifestyle':
                $modal = new Lifestyle();
                break;
        }
        if ($modal) {
            $result = $modal->find($id);
            $title = null;
            if ($result) {
                $title = $type . " | " . $result->name;
            }
            return view('guest.view', compact('result', 'title'));
        }
    }

    public function gallery()
    {
        $title = "GALLERY";
        $gallery = Gallery::all();
        return view('guest.gallery', compact('title', 'gallery'));
    }

    public function galleryView($id){
        $gallery = Gallery::all();
        $item= Gallery::findOrFail($id);
        $title = "GALLERY";
        return view('guest.galleryView', compact('title', 'gallery','item'));

    }


    public function about(){
        $title = "ABOUT";
        $head = About::orderBy('created_at', 'asc')->first();
        $staff = null; 

        if($head){
            $staff = About::where('id', '!=', $head->id)->get();
        }
        return view('guest.about', compact('title','head','staff'));
    }

    public function request(){
        $title = "SERVICE REQUEST";
        return view('guest.request', compact('title'));
        
    }

    public function submitRequest(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'requesting_party' => 'required|string',
            'mobile_number' => 'required|string',
            'email_address' => 'required|email',
            'activity_title' => 'required|string',
            'coverage' => 'required|string|in:Interview,Event Coverage,Photo Documentation,Social Media Publication,Multimedia Coverage,Others',
            'event_description' => 'required|string',
            'program_highlights' => 'required|string',
            'date' => 'required|date',
            'time' => 'required',
            'venue' => 'required|string',
            'notes' => 'nullable|string',
        ]);
    
        ModelsRequest::create([
            'requesting_party' => $validated['requesting_party'],
            'mobile_number' => $validated['mobile_number'],
            'email_address' => $validated['email_address'],
            'activity_title' => $validated['activity_title'],
            'coverage' => $validated['coverage'],
            'event_description' => $validated['event_description'],
            'program_highlights' => $validated['program_highlights'],
            'date' => $validated['date'],
            'time' => $validated['time'],
            'venue' => $validated['venue'],
            'notes' => $validated['notes'],
            'status' => 'pending',
        ]);
    
        return redirect()->route('home')->with('success', 'Request submitted successfully!');
    }
    

}
