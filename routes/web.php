<?php

use App\Livewire\Acasa;
use App\Livewire\Despre;
use Illuminate\Support\Facades\Route;

Route::get('/', Acasa::class);
Route::get('/despre', Despre::class);
