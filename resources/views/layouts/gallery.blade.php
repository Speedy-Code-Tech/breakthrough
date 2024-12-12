@extends('layouts.guest')

@section('main')
<div class="mainContainer">
    <div class="container-fluid d-flex pt-3">
        
    @if (count($gallery)>0)

        <div class="galleryNav">
            <div class="container-fluid d-flex flex-column p-4 m-0">
                <p class="m-0 p-0 text-white" style="font-family: 'Inter'">
                    ALBUM
                </p>
                <div class="whiteLine mb-3"></div>
                @foreach ($gallery as $items)
                <a href="{{ route('gallery.view', ['id' => $items->id]) }}" class="gal {{($item->name===$items->name && Route::currentRouteName()=='gallery.view') ? 'galactive':''}}"
                    style="text-decoration: none; cursor: pointer;">

                    <p class="m-0 p-0 ps-4" style="font-family: 'Inter'">
                        {{ $items->name }}
                    </p>
                </a>
                @endforeach
            </div>
        </div>
        @yield('gallery')
        @else
        <div style="font-family: 'Inter';" class="pt-4 text-secondary container-fluid d-flex justify-content-center align-items-center">
            -----  No Gallery Available  -----
        </div>
        @endif

    </div>
</div>
@endsection