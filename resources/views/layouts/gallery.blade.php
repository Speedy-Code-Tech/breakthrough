@extends('layouts.guest')

@section('main')
    <div class="mainContainer">
        <div class="container-fluid d-flex pt-3">
            <div class="galleryNav">
                <div class="container-fluid d-flex flex-column p-4 m-0">
                <p class="m-0 p-0 text-white" style="font-family: 'Inter'">
                    ALBUM
                </p>
                <div class="whiteLine mb-3"></div>
                @foreach ($gallery as $item)
                    <a href="{{ route('gallery.view', ['id' => $item->id]) }}" class="text-white pb-2"
                        style="text-decoration: none; cursor: pointer;">
                    <p class="m-0 p-0 ps-4 text-white"style="font-family: 'Inter'">
                        {{ $item->name }}
                    </p>
                </a>
                @endforeach
                </div>
            </div>
            @yield('gallery')
        </div>
    </div>
@endsection
