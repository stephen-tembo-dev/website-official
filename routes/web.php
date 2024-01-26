<?php

use App\Livewire\AboutEditor\{
    AddBannerContent,
    AddInfoListContent,
    AddMainContent,
    EditBannerContent,
    EditInfoListContent,
    EditMainContent
};
use Illuminate\Support\Facades\Route;
use App\Livewire\News\NewsStory;
use App\Livewire\Program\Programs;
use App\Livewire\Other\{Home, Contact, AboutUs};
use App\Livewire\HomeEditor\{AddSliderInfo, AddMarketingInfo, EditSliderInfo, EditMarketingInfo};


Route::get('/', Home::class);
Route::get('/contact', Contact::class);
Route::get('/about-us', AboutUs::class);
Route::get('/programs/{category}', Programs::class);
Route::get('/news-story/{id}', NewsStory::class);

// Home editor routes
Route::get('/create-marketing-info', AddMarketingInfo::class);
Route::get('/create-slider-info', AddSliderInfo::class);
Route::get('/edit-marketing-info/{id}', EditMarketingInfo::class);
Route::get('/edit-slider-info/{id}', EditSliderInfo::class);

// About editor routes
Route::get('/about-us/add-banner-content', AddBannerContent::class)->name('about.create.banner-content');
Route::get('/about-us/edit-banner-content/{banner}', EditBannerContent::class)->name('about.edit.banner-content');
Route::get('/about-us/add-main-content', AddMainContent::class)->name('about.add.main-content');
Route::get('/about-us/edit-main-content/{mainContent}', EditMainContent::class)->name('about.edit.main-content');
Route::get('/about-us/add-info-list-content', AddInfoListContent::class)->name('about.add.info-list-content');
Route::get('/about-us/edit-info-list-content/{listContent}', EditInfoListContent::class)->name('about.edit.info-list-content');

Auth::routes();



























/*

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
