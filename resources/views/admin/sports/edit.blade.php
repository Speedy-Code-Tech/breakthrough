@extends('layouts.adminNavigation')
@section('title', $title)
@section('maintab')
        <div class="mainTabs">
            <div class="row" style="border-bottom: 1px solid; padding-block: 10px; margin-bottom: 10px;">
                <div class="col text-start"
                    style="font-family: 'Inter',sans-serif; font-weight: bold; font-size: 1.5em;">EDIT ANNOUNCEMENT
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <form action="{{ route('sports.update', $items->id) }}" method="POST" class="p-5" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Use PUT for updates -->
                <div class="row mb-3 d-flex gap-3 flex-column">

                    <div class="col">
                        <label for="title" class="fw-bold pb-2">TITLE</label>
                        <input id="title" placeholder="Title" type="text"
                            class="form-control @error('title') is-invalid @enderror" name="title"
                            value="{{ $items->name }}" required autofocus>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="hashtag" class="fw-bold pb-2">HASHTAG</label>
                        <textarea id="hashtag" placeholder="#BreakThrough" class="form-control @error('hashtag') is-invalid @enderror"
                            name="hashtag" required>{{$items->hashtag}}</textarea>
                        @error('hashtag')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="description" class="fw-bold pb-2">DESCRIPTION</label>
                        <textarea id="description" placeholder="Description" class="form-control @error('description') is-invalid @enderror"
                            name="description" required>{{ $items->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="image" class="fw-bold pb-2">PHOTO UPLOAD</label>
                        <!-- Display the existing image -->
                        @if ($items->image_path)
                            <div class="mb-3">
                                <img src="{{ asset('storage/public/'.$items->image_path) }}" alt="Current Image" style="max-width: 200px; max-height: 200px; object-fit: cover;">
                            </div>
                        @endif
                        <input id="image" placeholder="Image" type="file"
                            class="form-control @error('image') is-invalid @enderror" name="image">

                        @error('image')
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
