<?php

namespace App\Livewire\Other;

use App\Models\Home\HomeAboutContent;
use App\Models\Home\HomeAnnouncement;
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
            $this->announcementBanners = HomeAnnouncement::all();
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
