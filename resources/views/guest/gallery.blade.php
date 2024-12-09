@extends('layouts.gallery')
@section('title', $title)
@section('gallery')
    <div class="container-fluid d-flex flex-column justify-column-start gallery align-items-start">
        @foreach ($gallery as $item)
            <div class="row pb-3">
                <div class="tag d-flex gap-2 align-items-center pb-2" style="font-family: 'Inter'">
                    <a href="{{ route('gallery.view', ['id' => $item->id]) }}" class="text-dark d-flex gap-2 align-items-center" style="text-decoration: none">
                        <p class="m-0 p-0">{{ $item->name }}</p>
                    <span class="m-0 p-0" style="font-size: 13px">
                        @php
                            $arrays = explode(',', $item->image_path);
                            $count = 0;
                            foreach ($arrays as $key) {
                                $count = $count + 1;
                            }
                        @endphp

                        {{ $count }} photos</span>
                    </a>

                </div>
                <div class="d-flex gap-2 flex-wrap">
                    @php
                        $images = explode(',', $item->image_path);
                @endphp

                @foreach ($images as $image)
                <a href="{{ asset('/storage/public/' . trim($image)) }}" target="_blank">
                        <img src="{{ asset('/storage/public/' . trim($image)) }}" alt=""
                            style="width: 100px; height: 100px; object-fit: cover;">
                        </a>
                            @endforeach
                </div>

            </div>
        @endforeach
    </div>
@endsection
