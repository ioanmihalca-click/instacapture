<?php

use App\Livewire\Acasa;
use App\Livewire\BlogIndex;
use App\Livewire\BlogShow;
use App\Livewire\Contact;
use App\Livewire\Despre;
use App\Livewire\Experienta;
use App\Livewire\Portofoliu;
use App\Livewire\Servicii;
use App\Livewire\Skilluri;
use App\Services\CloudinaryService;
use Illuminate\Support\Facades\Route;

Route::livewire('/', Acasa::class)->name('home');
Route::livewire('/despre', Despre::class)->name('despre');
Route::livewire('/skilluri', Skilluri::class)->name('skilluri');
Route::livewire('/servicii', Servicii::class)->name('servicii');
Route::livewire('/experienta', Experienta::class)->name('experienta');
Route::livewire('/portofoliu', Portofoliu::class)->name('portofoliu');
Route::livewire('/contact', Contact::class)->name('contact');

// New route for fetching image information
Route::get('/image-info/{publicId}', function ($publicId) {
    $cloudinaryService = app(CloudinaryService::class);
    $imageInfo = $cloudinaryService->getImageInfo($publicId);

    return response()->json($imageInfo);
});

// Blog
Route::livewire('/blog', BlogIndex::class)->name('blog.index');
Route::livewire('/blog/{slug}', BlogShow::class)->name('blog.show');
