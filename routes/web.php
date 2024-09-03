<?php


use App\Livewire\Acasa;
use App\Livewire\Contact;
use App\Livewire\Despre;
use App\Livewire\Experienta;
use App\Livewire\Portofoliu;
use App\Livewire\Servicii;
use App\Livewire\Skilluri;
use Illuminate\Support\Facades\Route;

Route::get('/', Acasa::class)->name('home');
Route::get('/despre', Despre::class)->name('despre');
Route::get('/skilluri', Skilluri::class)->name('skilluri');
Route::get('/servicii', Servicii::class)->name('servicii');
Route::get('/experienta', Experienta::class)->name('experienta');
Route::get('/portofoliu', Portofoliu::class)->name('portofoliu');
Route::get('/contact', Contact::class)->name('contact');