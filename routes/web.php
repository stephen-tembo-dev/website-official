<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\AboutEditor\{
    AddBannerContent,
    AddInfoListContent,
    AddMainContent,
    EditBannerContent,
    EditInfoListContent,
    EditMainContent
};

use App\Livewire\News\{AddNewsStory, EditNewsStory, NewsStory, AllNewsStories};
use App\Livewire\Program\Programs;
use App\Livewire\Other\{Home, Contact, AboutUs};
use App\Livewire\HomeEditor\{AddSliderInfo, AddMarketingInfo, EditSliderInfo, EditMarketingInfo};


Route::get('/', Home::class);
Route::get('/contact', Contact::class);
Route::get('/about-us', AboutUs::class);
Route::get('/programs/{category}', Programs::class);

// Home editor routes
Route::get('/create-marketing-info', AddMarketingInfo::class);
Route::get('/create-slider-info', AddSliderInfo::class);
Route::get('/edit-marketing-info/{info_id}', EditMarketingInfo::class);
Route::get('/edit-slider-info/{slider_id}', EditSliderInfo::class);

// News editor routes

Route::get('/create-news-story', AddNewsStory::class);
Route::get('/edit-news-story/{news_id}', EditNewsStory::class);
Route::get('/news-story/{news_id}', NewsStory::class);
Route::get('/all-news-stories', AllNewsStories::class);

// About editor routes
Route::get('/about-us/add-banner-content', AddBannerContent::class)->name('about.add.banner-content');
Route::get('/about-us/edit-banner-content/{banner}', EditBannerContent::class)->name('about.edit.banner-content');
Route::get('/about-us/add-main-content', AddMainContent::class)->name('about.add.main-content');
Route::get('/about-us/edit-main-content/{mainContent}', EditMainContent::class)->name('about.edit.main-content');
Route::get('/about-us/add-info-list-content', AddInfoListContent::class)->name('about.add.info-list-content');
Route::get('/about-us/edit-info-list-content/{listContent}', EditInfoListContent::class)->name('about.edit.info-list-content');

Auth::routes();
