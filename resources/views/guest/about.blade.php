@extends('layouts.guest')
@section('title', $title)
@section('main')
    <div class="mainContainer">
        <div class="container-fluid">
            <div class="row d-flex">
                <div class="col-3 d-flex flex-column gap-2 justify-content-center align-items-center">
                    <img src="{{ asset('/assets/images/logo.png') }}" alt=""
                        style="width: 150px; height: 150px; object-fit: contain;">
                    <p class="m-0 p-0 text-center">
                        Breakthrough - CNSC is the official publication of Camarines Norte State College, dedicated to
                        providing a platform for creative expression, responsible journalism, and student engagement. As a
                        beacon of truth and innovation, we aim to inform, inspire, and empower the CNSC community through
                        high-quality content that reflects our academic excellence, cultural diversity, and shared
                        aspirations. Join us as we document the stories that shape our campus and celebrate the voices that
                        lead us toward a brighter future.
                    </p>
                </div>
                <div class="col d-flex p-3 align-items-center gap-2 flex-column"
                    style="height: 80vh; overflow-y: scroll; overflow-x: hidden">
                    <img src="{{ asset('/assets/images/staff.png') }}" alt=""
                        style="width: 300px; height: auto; object-fit: contain;">
                    <div class="container-fluid p-0 m-0">
                        @if ($head)
                            {{-- HEAD --}}
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('/storage/public/' . $head->image_path) }}" alt="" class="pb-2"
                                    style="width: 100px; height: 100px; object-fit: fill; border-radius: 50%;">
                                <p class="p-0 m-0" style="font-family: 'Inter'">
                                    {{ $head->lname . ', ' . $head->fname . ' ' . $head->mname[0] . '.' }}</p>
                                <p class="p-0 m-0" style="font-family: 'Inter'; font-style: italic">{{ $head->position }}
                                </p>
                            </div>
                            {{-- STAFF --}}
                            <div class="container-fluid px-5 mt-4 m-0 d-flex justify-content-evenly flex-wrap">
                                @foreach ($staff as $item)
                                    <div class="d-flex flex-column pb-5 justify-content-center align-items-center">
                                        <img src="{{ asset('/storage/public/' . $item->image_path) }}" alt=""
                                            class="pb-2"
                                            style="width: 100px; height: 100px; object-fit: fill; border-radius: 50%;">
                                        <p class="p-0 m-0" style="font-family: 'Inter'">
                                            {{ $item->lname . ', ' . $item->fname . ' ' . $item->mname[0] . '.' }}</p>
                                        <p class="p-0 m-0" style="font-family: 'Inter'; font-style: italic">
                                            {{ $item->position }}</p>
                                    </div>
                                @endforeach

                            </div>
                        @else
                            <p class="text-center text-secondary fw-bold pt-5" style="font-family: 'Inter'">----- No Staff
                                Available -----</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
