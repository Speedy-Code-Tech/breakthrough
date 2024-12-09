@extends('layouts.gallery')

@section('title', $title)

@section('gallery')
<div class="container-fluid py-3 gallerys">
    <!-- Header Section -->
    <div class="text-center mb-4">
        <h3 class="mb-1" style="font-family: 'Inter'; font-size: 1.8rem;">{{ $item->name }}</h3>
        <p style="font-family: 'Inter'; font-size: 1rem; color: #555;">BY - BREAKTHROUGH</p>
    </div>

    <!-- Gallery Section -->
    <div class="d-flex flex-wrap justify-content-center gap-3 flex-wrap" style="height: 50vh; overflow: scroll">
        @php
            $images = explode(',', $item->image_path);
        @endphp

        @foreach ($images as $image)
            <div class="gallery-item">
                <a href="{{ asset('/storage/public/' . trim($image)) }}" target="_blank">
                <img src="{{ asset('/storage/public/' . trim($image)) }}" 
                     alt="Gallery Image" 
                     class="img-thumbnail" 
                     style="width: 300px; height: 300px; object-fit: contain;">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
