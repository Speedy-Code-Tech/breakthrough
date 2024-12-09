<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\EntertainementController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LifestyleController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SportsController;
use App\Models\Request;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/home', [AdminController::class, 'home'])->name('admin.home');

    // NEWS 
    Route::prefix('news')->name('news.')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/add', [NewsController::class, 'create'])->name('create');
        Route::post('/store', [NewsController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [NewsController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [NewsController::class, 'destroy'])->name('destroy');
    });

    // ANNOUNCEMENTS
    Route::prefix('announcements')->name('announcement.')->group(function () {
        Route::get('/', [AnnouncementController::class, 'index'])->name('index');
        Route::get('/add', [AnnouncementController::class, 'create'])->name('create');
        Route::post('/store', [AnnouncementController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AnnouncementController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [AnnouncementController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [AnnouncementController::class, 'destroy'])->name('destroy');
    });

    // SPORTS
    Route::prefix('sports')->name('sports.')->group(function () {
        Route::get('/', [SportsController::class, 'index'])->name('index');
        Route::get('/add', [SportsController::class, 'create'])->name('create');
        Route::post('/store', [SportsController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SportsController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [SportsController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [SportsController::class, 'destroy'])->name('destroy');
    });

    // GALLERY
    Route::prefix('gallery')->name('gallery.')->group(function () {
        Route::get('/', [GalleryController::class, 'index'])->name('index');
        Route::get('/add', [GalleryController::class, 'create'])->name('create');
        Route::post('/store', [GalleryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [GalleryController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [GalleryController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [GalleryController::class, 'destroy'])->name('destroy');
    });

    // ENTERTAINMENT
    Route::prefix('entertainment')->name('entertainment.')->group(function () {
        Route::get('/', [EntertainementController::class, 'index'])->name('index');
        Route::get('/add', [EntertainementController::class, 'create'])->name('create');
        Route::post('/store', [EntertainementController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [EntertainementController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [EntertainementController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [EntertainementController::class, 'destroy'])->name('destroy');
    });

    // EVENT
    Route::prefix('event')->name('event.')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('index');
        Route::get('/add', [EventController::class, 'create'])->name('create');
        Route::post('/store', [EventController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [EventController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [EventController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [EventController::class, 'destroy'])->name('destroy');
    });

    // LIFESTYLE
    Route::prefix('lifestyle')->name('lifestyle.')->group(function () {
        Route::get('/', [LifestyleController::class, 'index'])->name('index');
        Route::get('/add', [LifestyleController::class, 'create'])->name('create');
        Route::post('/store', [LifestyleController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [LifestyleController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [LifestyleController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [LifestyleController::class, 'destroy'])->name('destroy');
    });

    // ABOUT
    Route::prefix('about')->name('about.')->group(function () {
        Route::get('/', [AboutController::class, 'index'])->name('index');
        Route::get('/add', [AboutController::class, 'create'])->name('create');
        Route::post('/store', [AboutController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AboutController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [AboutController::class, 'update'])->name('update');
        Route::post('/destroy/{id}', [AboutController::class, 'destroy'])->name('destroy');
    });


    // Request
    Route::prefix('request')->name('request.')->group(function () {
        Route::get('/', [RequestController::class, 'index'])->name('index');
        Route::get('/edit/{id}/{status}', [RequestController::class, 'edit'])->name('edit');
    });
});



Route::get('/',[GuestController::class,'index'])->name('home');
Route::get('/query/{type}',[GuestController::class,'article'])->name('article');
Route::get('/{type}/view/{id}',[GuestController::class,'newsview'])->name('news.view');
Route::get('/gallery',[GuestController::class,'gallery'])->name('gallery');
Route::get('/gallery/{id}',[GuestController::class,'galleryView'])->name('gallery.view');
Route::get('/about',[GuestController::class,'about'])->name('about');
Route::get('/request',[GuestController::class,'request'])->name('request');
Route::post('/request',[GuestController::class,'submitRequest'])->name('request.submit');
