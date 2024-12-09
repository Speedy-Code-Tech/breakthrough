@extends('layouts.adminNavigation')
@section('title', $title)
@section('maintab')
    <div class="mainTabs">
        <div class="row" style="border-bottom: 1px solid; padding-block: 10px; margin-bottom: 10px;">
            <div class="col text-start" style="font-family: 'Inter',sans-serif; font-weight: bold; font-size: 1.5em;">EDIT
                GALLERY
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <form action="{{ route('gallery.edit', $item->id) }}" method="POST" class="p-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3 d-flex gap-3 flex-column">
                <div class="col">
                    <label for="title" class="fw-bold pb-2">TITLE</label>
                    <input id="title" placeholder="Title" type="text"
                        class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $item->name }}"
                        required autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="images" class="fw-bold pb-2">PHOTO UPLOAD</label>
                    <!-- Display existing images -->
                    @if ($item->image_path)
                        @php
                            $images = explode(',', $item->image_path);
                        @endphp
                        <div class="mb-3">
                            @foreach ($images as $image)
                                <img src="{{ asset('storage/public/' . $image) }}" alt="Image"
                                    style="max-width: 100px; max-height: 100px; object-fit: cover; margin-right: 5px;">
                            @endforeach
                        </div>
                    @endif
                    <input id="images" type="file" class="form-control @error('images') is-invalid @enderror"
                        name="images[]" multiple>

                    @error('images')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="container-fluid text-end">
                    <button type="submit" class="btn btn-success" style="width: 100px;">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
