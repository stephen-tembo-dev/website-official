<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\CheckIfViewer;
use App\Livewire\Program\Programs;
use App\Livewire\Other\{Home, Contact, AboutUs, Dashboard, GeneralAdmissionRequirements, ResearchDepartment};
use App\Livewire\ProgramEditor\{AddAdmissionInfo, EditAdmissionInfo, ManageAdmissionInfo};
use App\Livewire\Events\{CreateEvent, EditEvent, ListEvents, ManageEvents, ShowEvent};
use App\Livewire\News\{AddNewsStory, EditNewsStory, NewsStory, AllNewsStories, ManageNews};
use App\Livewire\AboutEditor\{AddBannerContent, AddInfoListContent, AddMainContent, EditBannerContent, EditInfoListContent, EditMainContent};
use App\Livewire\CampusLife\{CampusLife,  CreateCampusLifeItem, EditCampusLifeItem};
use App\Livewire\HomeEditor\{AddAnnouncement, AddSliderInfo, AddMarketingInfo, EditAnnouncement, EditSliderInfo, EditMarketingInfo, ManageSlider};
use App\Livewire\Publications\{CreatePublication, EditPublication, ListPublications};
use App\Livewire\Schools\{ShowDepartment, ShowSchool};

Route::get('/', Home::class);
Route::get('/contact', Contact::class);
Route::get('/about-us', AboutUs::class)->name('about.index');
Route::get('/programs/{category}', Programs::class);
Route::get('/programs/{id}/{category}', Programs::class);
Route::get('/all-news-stories', AllNewsStories::class)->name('news.index');
Route::get('/news-story/{news_id}', NewsStory::class);
Route::get('/events', ListEvents::class)->name('events.index');
Route::get('/event/{event}', ShowEvent::class)->name('events.show');
Route::get('/campus-life', CampusLife::class)->name('campus-life.index');
Route::get('/publications', ListPublications::class)->name('publications.index');
Route::get('/admission-requirements', GeneralAdmissionRequirements::class)->name('general-requirements');
Route::get('/schools/{slug}', ShowSchool::class)->name('schools.show');
Route::get('/departments/{schoolSlug}/{departmentSlug}', ShowDepartment::class)->name('departments.show');
Route::get('/departments/research', ResearchDepartment::class)->name('departments.research');

Route::group(['middleware' => ['auth', CheckIfViewer::class]], function () {

    // Admin dashboard
    Route::get('/dashboard', Dashboard::class);

    // Home editor routes
    Route::get('/create-marketing-info', AddMarketingInfo::class);
    Route::get('/create-slider-info', AddSliderInfo::class);
    Route::get('/edit-marketing-info', EditMarketingInfo::class);
    Route::get('/edit-slider-info/{slider_id}', EditSliderInfo::class);
    Route::get('/create-announcement', AddAnnouncement::class)->name('home.create.announcement');
    Route::get('/edit-announcement/{announcement_id}', EditAnnouncement::class)->name('home.edit.announcement');
    Route::get('/manage-slider', ManageSlider::class)->name('manage-slider');

    // News editor routes
    Route::get('/create-news-story', AddNewsStory::class)->name('news.create');
    Route::get('/edit-news-story/{news_id}', EditNewsStory::class);
    Route::get('/manage-news', ManageNews::class)->name('manage-news');

    // Program editor routes
    Route::get('/create-admission-info', AddAdmissionInfo::class);
    Route::get('/edit-admission-info/{admission_info_id}', EditAdmissionInfo::class)->name('admission-infor');
    Route::get('/manage-admission-info', ManageAdmissionInfo::class);

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
    Route::get('/events/manage', ManageEvents::class)->name('events.manage');

    // Publications editor routes
    Route::get('/publications/create', CreatePublication::class)->name('publications.create');
    Route::get('/publications/edit/{publication}', EditPublication::class)->name('publications.edit');

    // Campus Life Editor
    Route::get('/campus-life/create-campus-life-item', CreateCampusLifeItem::class)->name('campus-life.create-campus-life-item');
    Route::get('/campus-life/edit-campus-life-item/{item}', EditCampusLifeItem::class)->name('campus-life.edit-campus-life-item');
});

Auth::routes();
