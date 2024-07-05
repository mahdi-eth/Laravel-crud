<?php

use App\Livewire\AddCar;
use App\Livewire\CarList;
use App\Livewire\EditCar;
use App\Livewire\TestPage; //import this in order for livewire to render the page
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test/page',TestPage::class); //simple like this...
Route::get('/cars',CarList::class); 

Route::get('/add/new',AddCar::class);
Route::get('/edit/car/{id}',EditCar::class);