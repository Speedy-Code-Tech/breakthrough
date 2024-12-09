@extends('layouts.adminNavigation')
@section('title', $title)
@section('maintab')
    <div class="mainTabs">
        <div class="row" style="border-bottom: 1px solid; padding-block: 10px; margin-bottom: 10px;">
            <div class="col text-start" style="font-family: 'Inter',sans-serif; font-weight: bold; font-size: 1.5em;">CREATE
                NEW NEWS
            </div>


        </div>
        <form action="{{ route('news.store') }}" method="POST" class="p-5" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3 d-flex gap-3 flex-column">

                <div class="col">
                    <label for="title" class="fw-bold pb-2">TITLE</label>
                    <input id="title" placeholder="Title" type="text"
                        class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"
                        required autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col">
                    <label for="description" class="fw-bold pb-2">DESCRIPTION</label>
                    <textarea id="description" placeholder="Description" class="form-control @error('description') is-invalid @enderror"
                        name="description" required></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col">
                    <label for="image" class="fw-bold pb-2">PHOTO UPLOAD</label>
                    <input id="image" placeholder="Image" type="file"
                        class="form-control @error('image') is-invalid @enderror" name="image" required autofocus>

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="container-fluid text-end">
                    <button type="submit" class="btn btn-success" style="width: 100px;">Submit</button>
                </div>
            </div>
        </form>

    </div>
@endsection