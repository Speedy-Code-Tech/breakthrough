@extends('layouts.guest')
@section('title', $title)
@section('main')
    <div class="mainContainer">
        <div class="container-fluid d-flex flex-column justify-content-center align-items-center">
            <div class="container-fluid d-flex justify-content-center align-items-center pt-2">
                <img src="{{ asset('/assets/images/trendings.png') }}" alt="" style="width: 200px">

            </div>
            <div class="container-fluid d-flex justify-content-center align-items-center pt-2">
                @if ($latest)
                    <a href="{{ route('news.view', ['type' => $title, 'id' => $latest->id]) }}"
                        style="color: black; text-decoration: none;">
                        <div class="container-fluid border d-flex pt-1 align-items-center">
                            <img src="{{ asset('/storage/public/' . $latest->image_path) }}" alt=""
                                style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="container-fluid d-flex flex-column p-1">
                                <h5 style="font-family: 'Inter'">{{ $latest->name }}</h5>
                                <p style="text-align: justify">
                                    @php
                                        $maxWords1 = 90; // Set your maximum word limit
                                        $words1 = explode(' ', $latest->description); // Split the text into words
                                        $truncatedText1 =
                                            count($words1) > $maxWords1
                                                ? implode(' ', array_slice($words1, 0, $maxWords1)) . '...'
                                                : $latest->description; // Truncate and append ellipsis if word count exceeds maxWords
                                    @endphp
                                    {{ $truncatedText1 }}
                                </p>
                            </div>
                        </div>
                    </a>
                @else
                    <p class="fw-bold text-secondary py-3" style="font-family: sans-serif">No Available {{$title}} Article as of Now </p>
                @endif

            </div>
            <div class="container-fluid">
                <div style="width: 100%; height: 10px; border-bottom: 1px solid;"></div>
            </div>
            <div class="container-fluid p-4">
                <div class="newsTab container-fluid">
                    @if ($items)
                        @foreach ($items as $item)
                            <a href="{{ route('news.view', ['type' => $title, 'id' => $item->id]) }}"
                                style="color: black; text-decoration: none;">
                                <div class="container-fluid d-flex py-4" style="border-bottom: 1px solid grey;">
                                    <img src="{{ asset('/storage/public/' . $item->image_path) }}" alt=""
                                        style="width: 150px; height: 150px; object-fit: cover;">
                                    <div class="container-fluid m-0 d-flex flex-column">
                                        <h5 style="font-family: 'Inter'">{{ $item->name }}</h5>
                                        @php
                                            $maxWords = 90; // Set your maximum word limit
                                            $words = explode(' ', $item->description); // Split the text into words
                                            $truncatedText =
                                                count($words) > $maxWords
                                                    ? implode(' ', array_slice($words, 0, $maxWords)) . '...'
                                                    : $item->description; // Truncate and append ellipsis if word count exceeds maxWords
                                        @endphp

                                        <p class="m-0" style="text-align: justify">{{ $truncatedText }}</p>
                                        <div class="d-flex gap-1 align-items-center">
                                            <img src="{{ asset('/assets/images/clock.png') }}" alt=""
                                                style="width: 30px; height: 30px; object-fit: contain">
                                            <p class="m-0 p-0">{{ $item->created_at->diffForHumans() }}</p>
                                        </div>
                                        <p class="pt-2 m-0" style="font-family: 'Inter'; font-weight: bold;color: grey;">
                                            {{ $latest->hashtag }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
