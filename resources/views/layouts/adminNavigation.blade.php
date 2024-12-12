@extends('layouts.contentPage')

@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: "{{ session('error') }}",
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif      
    <div class="mainContent h-100 d-flex flex-column pt-3">
        <p class="panelText">Administrator Panel</p>
        <div class="panelBackground">
            <div class="leftNav">
                <ul class="dashboardNav">
                    <li class="{{ Request::routeIs('admin.home') ? 'activeNav' : '' }}">
                        <a href="{{ route('admin.home') }}">Dashboard</a>
                    </li>
                    <li class="{{ Request::routeIs('request.index')|| Request::routeIs('request.view') ? 'activeNav' : '' }}">
                        
                        <a href="{{ route('request.index') }}">Request</a>
                    </li>
                    <li class="{{ Request::routeIs('news.index') ? 'activeNav' : '' }}">
                        <a href="{{ route('news.index') }}">News</a>
                    </li>
                    <li class="{{ Request::routeIs('announcement.index') ? 'activeNav' : '' }}">
                        <a href="{{ route('announcement.index') }}">Literary    </a>
                    </li>
                    <li class="{{ Request::routeIs('sports.index') ? 'activeNav' : '' }}">
                        <a href="{{ route('sports.index') }}">Sports</a>
                    </li>
                    <li class="{{ Request::routeIs('entertainment.index') ? 'activeNav' : '' }}">
                        <a href="{{ route('entertainment.index') }}">Entertainment</a>
                    </li>
                    <li class="{{ Request::routeIs('gallery.index') ? 'activeNav' : '' }}">
                        <a href="{{ route('gallery.index') }}">Gallery</a>
                    </li>
                    <li class="{{ Request::routeIs('event.index') ? 'activeNav' : '' }}">
                        <a href="{{ route('event.index') }}">Events</a>
                    </li>
                    <li class="{{ Request::routeIs('lifestyle.index') ? 'activeNav' : '' }}">
                        <a href="{{ route('lifestyle.index') }}">Lifestyle</a>
                    </li>
                    <li class="{{ Request::routeIs('about.index') ? 'activeNav' : '' }}">
                        <a href="{{ route('about.index') }}">About Us</a>
                    </li>
                </ul>
                
            </div>
            @yield('maintab')
        </div>
    </div>
@endsection
