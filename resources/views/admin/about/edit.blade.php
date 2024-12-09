@extends('layouts.adminNavigation')
@section('title', $title)

@section('maintab')
    <div class="mainTabs">
        <div class="row" style="border-bottom: 1px solid; padding-block: 10px; margin-bottom: 10px;">
            <div class="col text-start" style="font-family: 'Inter', sans-serif; font-weight: bold; font-size: 1.5em;">
                EDIT OFFICER
            </div>
        </div>
        <form action="{{ route('about.update', $officer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-3 d-flex flex-column">
                <div class="col">
                    <label for="fname" class="fw-bold pb-2">First Name</label>
                    <input type="text" name="fname" id="fname" class="form-control" value="{{ $officer->fname }}" required>
                </div>
                <div class="col">
                    <label for="mname" class="fw-bold pb-2">Middle Name</label>
                    <input type="text" name="mname" id="mname" class="form-control" value="{{ $officer->mname }}">
                </div>
                <div class="col">
                    <label for="lname" class="fw-bold pb-2">Last Name</label>
                    <input type="text" name="lname" id="lname" class="form-control" value="{{ $officer->lname }}" required>
                </div>
                <div class="col">
                    <label for="position" class="fw-bold pb-2">Position</label>
                    <input type="text" name="position" id="position" class="form-control" value="{{ $officer->position }}" required>
                </div>
                <div class="col">
                    <label for="image" class="fw-bold pb-2">Photo (optional)</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @if($officer->image_path)
                        <small>Current Image: <a href="{{ asset('storage/public/' . $officer->image_path) }}" target="_blank">View</a></small>
                    @endif
                </div>
            </div>

            <div class="container-fluid text-end">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
@endsection
