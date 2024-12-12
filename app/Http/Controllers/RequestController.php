<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index(){
        $title = "Updated Request";
        $requests = ModelsRequest::whereNot('status','deleted')->orderBy('created_at', 'desc')->get();
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

    public function view($id){
        $title = "VIEW REQUEST";
        $data = ModelsRequest::findOrFail($id);

        return view('admin.view', compact('title','data'));
    }
}
