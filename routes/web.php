<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Program\Programs;
use App\Livewire\Other\{Home, Contact, AboutUs, Dashboard};
use App\Livewire\ProgramEditor\{AddAdmissionInfo, EditAdmissionInfo};
use App\Livewire\Events\{CreateEvent, EditEvent, ListEvents, ShowEvent};
use App\Livewire\News\{AddNewsStory, EditNewsStory, NewsStory, AllNewsStories};
use App\Livewire\HomeEditor\{AddAnnouncement, AddSliderInfo, AddMarketingInfo, EditAnnouncement, EditSliderInfo, EditMarketingInfo};
use App\Livewire\AboutEditor\{AddBannerContent, AddInfoListContent, AddMainContent, EditBannerContent, EditInfoListContent, EditMainContent};

Route::get('/', Home::class);
Route::get('/contact', Contact::class);
Route::get('/about-us', AboutUs::class);
Route::get('/programs/{category}', Programs::class);
Route::get('/programs/{id}/{category}', Programs::class);
Route::get('/news-story/{news_id}', NewsStory::class);
Route::get('/events', ListEvents::class)->name('events.index');
Route::get('/event/{event}', ShowEvent::class)->name('events.show');

// Admin dashboard
Route::get('/dashboard', Dashboard::class);

// Home editor routes
Route::get('/create-marketing-info', AddMarketingInfo::class);
Route::get('/create-slider-info', AddSliderInfo::class);
Route::get('/edit-marketing-info/{info_id}', EditMarketingInfo::class);
Route::get('/edit-slider-info/{slider_id}', EditSliderInfo::class);
Route::get('/create-announcement', AddAnnouncement::class)->name('home.create.announcement');
Route::get('/edit-announcement/{announcement_id}', EditAnnouncement::class)->name('home.edit.announcement');

// News editor routes
Route::get('/create-news-story', AddNewsStory::class)->name('news.create');
Route::get('/edit-news-story/{news_id}', EditNewsStory::class);
Route::get('/news-story/{news_id}', NewsStory::class);
Route::get('/all-news-stories', AllNewsStories::class);

// Program editor routes
Route::get('/create-admission-info', AddAdmissionInfo::class);
Route::get('/edit-admission-info/{admission_info_id}', EditAdmissionInfo::class);

// About editor routes
Route::get('/about-us/add-banner-content', AddBannerContent::class)->name('about.add.banner-content');
Route::get('/about-us/edit-banner-content/{banner}', EditBannerContent::class)->name('about.edit.banner-content');
Route::get('/about-us/add-main-content', AddMainContent::class)->name('about.add.main-content');
Route::get('/about-us/edit-main-content/{mainContent}', EditMainContent::class)->name('about.edit.main-content');
Route::get('/about-us/add-info-list-content', AddInfoListContent::class)->name('about.add.info-list-content');
Route::get('/about-us/edit-info-list-content/{listContent}', EditInfoListContent::class)->name('about.edit.info-list-content');

// Events editor routes
Route::get('/events/create', CreateEvent::class)->name('events.create');
Route::get('/events/edit/{event}', EditEvent::class)->name('events.edit');

Auth::routes();
