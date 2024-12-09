@extends('layouts.guest')
@section('title', $title)
@section('main')
<div class="mainContainer">
    <div class="container-fluid d-flex flex-column px-3 pb-3">
        <div class="container-fluid p-5">
            <img src="{{ asset('/assets/images/home.png') }}" class="img-fluid" alt="">
        </div>
        <div class="container-fluid"></div>
    </div>
</div>
@endsection
