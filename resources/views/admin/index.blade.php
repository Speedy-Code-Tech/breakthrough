@extends('layouts.adminPage')
@section('title', $title)
@section('main')

    <div class="container-fluid d-flex flex-column mb-2">
        <div class="title pb-3">
            <div class="row"></div>
            <div class="row d-flex align-items-center">
                <div class="col-3 p-0 ps-2 m-0 text-start fw-bold">
                    {{ \Carbon\Carbon::now()->format('F j, Y h:i A') }}
                </div>
                <div class="col-6 p-0 m-0 text-center">
                    <img src="{{ asset('assets/images/tagline.png') }}" alt="" class="taglineAdmin">
                </div>
            </div>
        </div>
        <div class="line"></div>
        <div class="navs">
            <ul class="navigation">
                <li class="nav-itemss actives"><a href="" class="items">HOME</a></li>
                <li class="nav-itemss"><a href="">NEWS</a></li>
                <li class="nav-itemss"><a href="">ANNOUNCEMENTS</a></li>
                <li class="nav-itemss"><a href="">SPORTS</a></li>
                <li class="nav-itemss"><a href="">INTERTAINMENT</a></li>
                <li class="nav-itemss"><a href="">GALLERY</a></li>
                <li class="nav-itemss"><a href="">EVENTS</a></li>
                <li class="nav-itemss"><a href="">LIFESTYLE</a></li>
                <li class="nav-itemss"><a href="">ABOUT US</a></li>
            </ul>
        </div>
        <div class="mainContent h-100 d-flex flex-column pt-3">
            <p class="panelText">Administrator Panel</p>
            <div class="panelBackground">
                <div class="leftNav">
                    <ul class="dashboardNav">
                        <li><a href="">Dashboard</a></li>
                        <li><a href="">Service Request</a></li>
                        <li><a href="{{route('news.index')}}">News</a></li>
                        <li><a href="">Announcements</a></li>
                        <li><a href="">Sports</a></li>
                        <li><a href="">Entertainment</a></li>
                        <li><a href="">Gallery</a></li>
                        <li><a href="">Events</a></li>
                        <li><a href="">Lifestyle</a></li>
                        <li><a href="">About Us</a></li>
                    </ul>
                </div>
                <div class="mainTabs">
                    
                </div>
            </div>
        </div>
    </div>
@endsection
