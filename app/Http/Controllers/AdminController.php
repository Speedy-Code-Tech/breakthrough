<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index',['title'=>'Administrator']); 
    }

    public function home(){
        return view('admin.home.index',['title'=>'HOME | ADMIN']); 
    }


}
