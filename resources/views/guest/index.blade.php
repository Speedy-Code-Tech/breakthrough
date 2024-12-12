@extends('layouts.guest')
@section('title', $title)
@section('main')
<div class="mainContainer">
    <div class="container-fluid d-flex flex-column px-3 pb-3">
        <div class="container-fluid py-3">
            <img src="{{ asset('/assets/images/home.png') }}" class="img-fluid" alt="">
            <p class="text-center px-3 pb-2 pt-2" style="font-size: 2.25em; font-style: italic; color: black; font-family: 'Inter' sans-serif; font-weight: bolder;">"MAGNA EST VERITAS EST SUPREMA LEX ESTO"</p>
        </div>
        <!-- <div class="container-fluid justify-content-center align-items-center"></div> -->
    </div>
</div>
@endsection