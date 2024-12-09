@extends('layouts.adminPage')
@section('main')
    <div class="container-fluid d-flex flex-column mb-2">
        <div class="title">
            <div class="row"></div>
            <div class="row d-flex align-items-end pb-1">
                <div class="col-3 p-0 ps-2 m-0 text-start fw-bold">
                    {{ \Carbon\Carbon::now()->format('F j, Y h:i A') }}
                </div>
                <div class="col-6 pb-3 p-0 m-0 text-center">
                    <img src="{{ asset('assets/images/tagline.png') }}" style="width: 500px; height:auto;" alt="" class="taglineAdmin">
                </div>
            </div>
        </div>
        <div class="line"></div>
        @if (!auth()->user())
            <div class="navs">
                <ul class="navigation">
                    <li class="nav-itemss actives"><a href="{{ route('admin.home') }}" class="items">HOME</a></li>
                    <li class="nav-itemss"><a href="{{ route('news.index') }}">NEWS</a></li>
                    <li class="nav-itemss"><a href="">ANNOUNCEMENTS</a></li>
                    <li class="nav-itemss"><a href="">SPORTS</a></li>
                    <li class="nav-itemss"><a href="">INTERTAINMENT</a></li>
                    <li class="nav-itemss"><a href="">GALLERY</a></li>
                    <li class="nav-itemss"><a href="">EVENTS</a></li>
                    <li class="nav-itemss"><a href="">LIFESTYLE</a></li>
                    <li class="nav-itemss"><a href="">ABOUT US</a></li>
                </ul>
            </div>
        @endif

        @yield('content')
    </div>
@endsection
