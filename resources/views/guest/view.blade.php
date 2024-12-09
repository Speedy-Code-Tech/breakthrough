@extends('layouts.guest')
@section('title', $title)
@section('main')
    <div class="mainContainer">
        <div class="container-fluid d-flex flex-column">
            <!-- Header Section -->
            <div class="container pt-4">
                <div class="line my-2"></div>
            </div>
            <div class="container-fluid pt-4 d-flex justify-content-start flex-column align-items-center">
                <div class="container d-flex flex-column justify-column-start">
                    <div>
                        <h3 class="m-0" style="font-family: 'Inter'">{{ $result->name }}</h3>
                        <p class="m-0 " style="font-family: 'Inter'">BY BREAKTHROUGH - CNSC</p>
                        <p class="m-0  ">{{ $result->created_at->format('F d, Y h:i A') }}</p>
                    </div>
                    
                </div>
                <img src="{{ asset('/storage/public/' . $result->image_path) }}" alt="" style="width: 400px;"
                    class="pt-3">
                <p style="text-align: justify" class="pt-5 px-5">
                    {{ $result->description }}
                </p>
            </div>
        </div>
    </div>
@endsection
