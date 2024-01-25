<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomeEditor\{AddSliderInfo, AddMarketingInfo, EditSliderInfo, EditMarketingInfo};
use App\Livewire\Other\{Home, Contact, AboutUs};
use App\Livewire\Program\Programs;
use App\Livewire\News\NewsStory;
 
Route::get('/', Home::class);
Route::get('/contact',Contact::class);
Route::get('/about-us',AboutUs::class);
Route::get('/programs/{category}',Programs::class);
Route::get('/news-story/{id}',NewsStory::class);

// Home editor routes
Route::get('/create-marketing-info',AddMarketingInfo::class);
Route::get('/create-slider-info',AddSliderInfo::class);
Route::get('/edit-marketing-info/{info_id}',EditMarketingInfo::class);
Route::get('/edit-slider-info/{id}',EditSliderInfo::class);



Auth::routes();































/*

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

*/
