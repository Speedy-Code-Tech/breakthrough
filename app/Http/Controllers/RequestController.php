<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index(){
        $title = "Updated Request";
        $requests = ModelsRequest::orderBy('created_at', 'desc')->get();
        return view('admin.request', compact('title', 'requests'));
    }

    public function edit($id,$status){
        $title = "Updated Request";
        $requests = ModelsRequest::where('id',$id)->first();
        $requests->status = $status;
        
        if($requests->save()){
            return back()->with('success', 'Request '.$status.' successfully!');
        }else{
            return back()->with('error', 'Failed to update the Request!');
        }
    }
}
