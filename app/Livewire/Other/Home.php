<?php

namespace App\Livewire\Other;

use App\Models\Home\HomeAboutContent;
use App\Models\Home\HomeAnnouncementBanner;
use App\Models\Home\HomeHeroContent;
use Livewire\Component;

class Home extends Component
{
    public $heroSlides;
    public $aboutContent;
    public $announcementBanners;

    public function mount()
    {
        try {
            $this->heroSlides = HomeHeroContent::all();
            $this->aboutContent = HomeAboutContent::all();
            $this->announcementBanners = HomeAnnouncementBanner::all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    #[Layout('layouts.homeLayout')]
    public function render()
    {
        return view('livewire.other.home')->layout('components.layouts.homeLayout');
    }
}
