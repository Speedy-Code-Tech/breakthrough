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
                @foreach ($gallery as $items)
                    <a href="{{ route('gallery.view', ['id' => $items->id]) }}" class="gal pb-2
{{$items->name==$item->name?'activesGallery':''}}
                    "
                        style="text-decoration: none; cursor: pointer;">
                    <p class="m-0 p-0 ps-4"style="font-family: 'Inter'">
                        {{ $items->name }}
                         

                    </p>
                </a>
                @endforeach
                </div>
            </div>
            @yield('gallery')
        </div>
    </div>
@endsection
