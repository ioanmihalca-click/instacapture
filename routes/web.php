<?php


use App\Livewire\Acasa;
use App\Livewire\Despre;
use App\Livewire\Contact;
use App\Livewire\BlogShow;
use App\Livewire\Servicii;
use App\Livewire\Skilluri;
use App\Livewire\BlogIndex;
use App\Livewire\Experienta;
use App\Livewire\Portofoliu;
use App\Services\CloudinaryService;
use Illuminate\Support\Facades\Route;

Route::get('/', Acasa::class)->name('home');
Route::get('/despre', Despre::class)->name('despre');
Route::get('/skilluri', Skilluri::class)->name('skilluri');
Route::get('/servicii', Servicii::class)->name('servicii');
Route::get('/experienta', Experienta::class)->name('experienta');
Route::get('/portofoliu', Portofoliu::class)->name('portofoliu');
Route::get('/contact', Contact::class)->name('contact');

// New route for fetching image information
Route::get('/image-info/{publicId}', function ($publicId) {
    $cloudinaryService = app(CloudinaryService::class);
    $imageInfo = $cloudinaryService->getImageInfo($publicId);
    return response()->json($imageInfo);
});

//Blog
Route::get('/blog', BlogIndex::class)->name('blog.index');
Route::get('/blog/{slug}', BlogShow::class)->name('blog.show');